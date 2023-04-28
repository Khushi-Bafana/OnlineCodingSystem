const express = require('express');
const server = express();
const request = require('request');

server.use(express.json());

server.use(function(req, res, next) {
  res.header("Access-Control-Allow-Origin", "*");
  res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
  next();
});

server.get('/:cm', function(req, res) {
	console.log('[INFO]: GOT SOME REQ AS ' + req.params.cm);
	var code = req.params.cm;
	//const { returnval } = codeCompileMongerGod({ code });
	//res.send(returnval.error + "," + returnval.body.statusCode + "," + returnval.body.output);

    var program = {
        script : code,
        language: "python3",
        versionIndex: "0",
        clientId: "eca3fc381962ec50fddb90d575912a92",
        clientSecret:"824360eb0fde4c68a3068cc97bfb13769adb2da3423e8774e2cab67d53d81b12"
    };
    request({
        url: 'https://api.jdoodle.com/v1/execute',
        method: "POST",
        json: program
    },
    function (error, response, body) {
        console.log('error:', error);
        console.log('statusCode:', response && response.statusCode);
        console.log('body:', body);
		var returnValJ = new Object();
		returnValJ.err = error;
		returnValJ.bdOutput = body.output;
		returnValJ.bdRam = body.memory;
		returnValJ.bdCPU = body.cpuTime;
		res.send(returnValJ);
	});
});

server.post('/cm', function(req, res) {
    console.log('body: ' + JSON.stringify(req.body))
    var codeH = req.body;
    console.log(codeH.code);
    var codeFinal = codeH.code;
    var language = codeH.language;
	//const { returnval } = codeCompileMongerGod({ code });
	//res.send(returnval.error + "," + returnval.body.statusCode + "," + returnval.body.output);

    var program = {
        script : codeFinal,
        language: language,
        versionIndex: "0",
        clientId: "eca3fc381962ec50fddb90d575912a92",
        clientSecret:"824360eb0fde4c68a3068cc97bfb13769adb2da3423e8774e2cab67d53d81b12"
    };
    request({
        url: 'https://api.jdoodle.com/v1/execute',
        method: "POST",
        json: program
    },
    function (error, response, body) {
        console.log('error:', error);
        console.log('statusCode:', response && response.statusCode);
        console.log('body:', body);
		var returnValJ = new Object();
		returnValJ.err = error;
		returnValJ.bdOutput = body.output;
		returnValJ.bdRam = body.memory;
		returnValJ.bdCPU = body.cpuTime;
		res.send(returnValJ);
	});
});

const codeCompileMongerGod = ({ code }) => {

    var returnVal;

    var program = {
        script : code,
        language: "python3",
        versionIndex: "0",
        clientId: "eca3fc381962ec50fddb90d575912a92",
        clientSecret:"824360eb0fde4c68a3068cc97bfb13769adb2da3423e8774e2cab67d53d81b12"
    };
    request({
        url: 'https://api.jdoodle.com/v1/execute',
        method: "POST",
        json: program
    },
    function (error, response, body) {
        console.log('error:', error);
        console.log('statusCode:', response && response.statusCode);
        console.log('body:', body);
        returnVal = [error, body];
    });
};

server.listen(3000, () => console.log("[NOTICE]: SERVER STARTED AT PORT 5050."));
