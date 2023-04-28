$(document).ready(function() {
    var action = "active";
    const proxy = "https://cors-anywhere.herokuapp.com/";
    const url = "http://localhost:3000/";
    function callCompileApi() {
        var codeText = $("#codeTxt").val();
        var language = $("#language").val();
        console.log(url + codeText);
        console.log(codeText);
        var program = {
            script: codeText,
        };
        /*
        $.ajax({
            method: "GET",
            url: url + codeText,
            success:function(data) {
                console.log(JSON.stringify(data));
                console.log(data.err);
                console.log(data.bdRam);
                var jsonData = JSON.stringify(data);
                var isPass = jsonData.includes("File ");
                if(!isPass) {
                    $('#status').val("PASSED");
                } else {
                    $('#status').val("FAILED");
                }
                $('#ramL').val(data.bdRam);
                $('#ansL').val(data.bdOutput);
            }
        });*/
        var dataH = {};
        dataH.code = codeText;
        dataH.language = language;
        $.ajax({
            type: 'POST',
			data: JSON.stringify(dataH),
            contentType: 'application/json',
            url: url + "cm",
            success:function(data) {
                console.log(JSON.stringify(data));
                console.log(data.err);
                console.log(data.bdRam);
                var jsonData = JSON.stringify(data);
                var isPass = jsonData.includes("File ");
                if(!isPass) {
                    $('#status').val("PASSED");
                } else {
                    $('#status').val("FAILED");
                }
                $('#ramL').val(data.bdRam);
                $('#ansL').val(data.bdOutput);
            }
        });
    }
    $("#pRun").click(function() {
        setTimeout(function() {
            callCompileApi();
        }, 1000);
    });
});


document.getElementById('codeTxt').addEventListener('keydown', function(e) {
    if (e.key == 'Tab') {
      e.preventDefault();
      var start = this.selectionStart;
      var end = this.selectionEnd;
  
      this.value = this.value.substring(0, start) +
        "\t" + this.value.substring(end);
  
      this.selectionStart =
        this.selectionEnd = start + 1;
    }
});
