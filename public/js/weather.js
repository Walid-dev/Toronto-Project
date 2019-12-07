class GetWeather {
    constructor(apiKey, city, country, weathField, weathIcon) {
        this.displayWeather = function() {
            this.apiKey = apiKey;
            this.city = city;
            this.country = country;
            this.tempeField = weathField;
            this.weathIcon = weathIcon;
            // Api Calling with fetch method and get the promise
            this.getPromise = fetch(
                `http://api.openweathermap.org/data/2.5/weather?q=${city},${country}&APPID=${apiKey}&units=metric&lang=Fr`
            ).then((response) => response.json());

            this.getPromise.then(function(data) {
                console.log(data.weather[0].description);
                let description = data.weather[0].description;
                let icon = data.weather[0].icon;
                let temperature = Math.round(data.main.temp);
                //  document.getElementById(`${weathField}`).innerHTML = `${temperature}` + "°" + " -> " + `${description}`;
                document.getElementById(`${weathField}`).innerHTML = `${temperature}`;

                document.getElementById(`${weathIcon}`).innerHTML =
                    "<img class=" +
                    " image-fluid " +
                    "src=" +
                    "http://openweathermap.org/img/wn/" +
                    `${icon}` +
                    "@2x.png" +
                    " " +
                    `"alt=""` +
                    ">";
            });
            // Ready to use the data from the promise
        };
    }
}
