<script>
    var botmanWidget = {
        aboutText: 'Start conversation with Hi',
        introMessage: ""
    };

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            // Parse the JSON response
            var jsonData = JSON.parse(this.responseText);
            
            // Set the introMessage property of botmanWidget
            botmanWidget.introMessage = jsonData.message;
        }
    };
    xhr.open("GET", "json.json", true);
    xhr.send();

    var botmanWidget = {
        title:'YearnBot',
        mainColor:'#7D5452',
        aboutText:'',
        bubbleBackground:'#7D5452',
        headerTextColor: '#E4D8CC',
    };
</script>

<script src="https://cdn.jsdelivr.net/npm/botman-web-widget@0.0.20/build/js/widget.min.js
">


</script>