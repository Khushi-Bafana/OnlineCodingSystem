const request = require('request');

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

module.exports = { codeCompileMongerGod };