            var MQTTbroker = 'broker.mqttdashboard.com';
            var MQTTport = 8000;
            var MQTTtopic = 'ezwashing/mach1';
            var dataTopics = new Array();
            var client = new Paho.MQTT.Client(MQTTbroker, MQTTport, getRandomClientId());
            client.onMessageArrived = onMessageArrived;
            client.onConnectionLost = onConnectionLost;
             var options = {
                timeout: 3,
                onSuccess: () => {
                    console.log("[mqtt:connection] connected");
                    alert("Connection succeeded.");
                    client.subscribe(MQTTtopic, {qos: 1});
                },
                onFailure: (message) => {
                    console.log("[mqtt:connection] failed, ERROR: " + message.errorMessage);
                    alert("Connection failed, ERROR: " + message.errorMessage);
                    window.setTimeout(location.reload(), 5000); //wait 5seconds before trying to connect again.
                }
            };

            function onConnectionLost(responseObject) {
                console.log("[mqtt:connection] lost, ERROR: " + responseObject.errorMessage);
                window.setTimeout(location.reload(), 5000);
            };
            function onMessageArrived(message) {
                console.log("[mqtt:arrived] " + message.destinationName, '',message.payloadString);
                var thenum = message.payloadString.replace( /^\D+/g, ''); //remove any text spaces from the message
                document.getElementById("printf").innerHTML = Number(thenum);

            };


            //2
            function init() {
             
                Highcharts.setOptions({
                    global: { useUTC: false }
                });
                // Connect to MQTT broker
                client.connect(options);

                var newseries = { id: 0, name: MQTTtopic, data: [] };
                dataTopics.push(MQTTtopic); // add subscribe topic to dataTopics
                setInterval(lineGen, 1000);
            };


