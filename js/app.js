            var MQTTbroker = 'broker.mqttdashboard.com';
            var MQTTport = 8000;
            var MQTTtopic = 'ezwashing/mach1';
            var MQTTtopic2 = 'ezwashing/mach2';
            var dataTopics = new Array();
            var dataTopics2 = new Array();
            var client = new Paho.MQTT.Client(MQTTbroker, MQTTport, getRandomClientId());
            var client2 = new Paho.MQTT.Client(MQTTbroker, MQTTport, getRandomClientId());
            client.onMessageArrived = onMessageArrived;
            client2.onMessageArrived = onMessageArrived2;

            client.onConnectionLost = onConnectionLost;
            client.onConnectionLost = onConnectionLost2;
             var options = {
                timeout: 3,
                onSuccess: () => {
                    console.log("[mqtt:connection] connected");
                    alert("Connection succeeded.");
                    client.subscribe(MQTTtopic,{qos: 1});
                },
                onFailure: (message) => {
                    console.log("[mqtt:connection] failed, ERROR: " + message.errorMessage);
                    // alert("Connection failed, ERROR: " + message.errorMessage);
                    // window.setTimeout(location.reload(), 5000); //wait 5seconds before trying to connect again.
                }
            };


            var options2 = {
                timeout: 3,
                onSuccess: () => {
                    console.log("[mqtt:connection] connected");
                    alert("Connection succeeded.2");
                    client2.subscribe(MQTTtopic2,{qos:2});
                },
                onFailure: (message) => {
                    console.log("[mqtt:connection] failed, ERROR: " + message.errorMessage);
                    alert("Connection failed, ERROR: " + message.errorMessage);
                    // window.setTimeout(location.reload(), 5000); //wait 5seconds before trying to connect again.
                }
            };


            function onConnectionLost(responseObject) {
                console.log("[mqtt:connection] lost, ERROR: " + responseObject.errorMessage);
                window.setTimeout(location.reload(), 5000);
            };
            function onMessageArrived(message) {
                console.log("[mqtt:arrived 1] " + message.destinationName, '',message.payloadString);
                var thenum = message.payloadString.replace( /^\D+/g, ''); //remove any text spaces from the message
                document.getElementById("printf").innerHTML = thenum;
                 if(Number(thenum) > 0){
                    $('#washing-1').addClass('countdown_on');
                    document.getElementById("printf").innerHTML = Number(thenum);
                }else{
                    $('#washing-1').removeClass('countdown_on');
                    document.getElementById("printf").innerHTML = 'ว่าง';
                }

            };

             function onMessageArrived2(message) {
                console.log("[mqtt:arrived 2] " + message.destinationName, '',message.payloadString);
                var thenum = message.payloadString.replace( /^\D+/g, ''); //remove any text spaces from the message
                if(Number(thenum) > 0){
                    $('#washing-2').addClass('countdown_on');
                    document.getElementById("printf2").innerHTML = Number(thenum);
                }else{
                    $('#washing-2').removeClass('countdown_on');
                    document.getElementById("printf2").innerHTML = 'ว่าง';
                }
            };
            function onConnectionLost2(responseObject) {
                console.log("[mqtt:connection] lost, ERROR: " + responseObject.errorMessage);
                window.setTimeout(location.reload(), 5000);
            };


            //2
            function init() {
             
                Highcharts.setOptions({
                    global: { useUTC: false }
                });
                // Connect to MQTT broker
                client.connect(options);
                client2.connect(options2);
                var newseries = { id: 0, name: MQTTtopic, data: [] };
                dataTopics.push(MQTTtopic); // add subscribe topic to dataTopics
                alert(dataTopics);
                var newseries2 = { id: 2, name: MQTTtopic2, data: [] };
                dataTopics2.push(MQTTtopic2); // add subscribe topic to dataTopics
                alert(dataTopics2);
                setInterval(lineGen, 1000);
            };


