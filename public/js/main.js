// Display TorontoMap

const torontoMap = new CreateMap(
    "mapid",
    "43.653226",
    "-79.3831843",
    "13",
    "pk.eyJ1Ijoid2xhZDM0IiwiYSI6ImNqeHA5N25qYTBhZnozbmwzMmdmczBtcGoifQ.hYSWIqrFTCmtKzfE56Y4iw"
);

torontoMap.displayMap();
torontoMap.addClusters();
torontoMap.disableEnableZoomMap();

// Display Cities Weather

const torontoWeather = new GetWeather(
    "360cccc6e22db8194872d3b393f23d91",
    "toronto",
    "canada",
    "torontoWeath",
    "torontoIcon"
);

const montrealWeather = new GetWeather(
    "360cccc6e22db8194872d3b393f23d91",
    "montreal",
    "canada",
    "montrealWeath",
    "montrealIcon"
);

const ottawaWeather = new GetWeather(
    "360cccc6e22db8194872d3b393f23d91",
    "ottawa",
    "canada",
    "ottawaWeath",
    "ottawaIcon"
);

const vancouverWeather = new GetWeather(
    "360cccc6e22db8194872d3b393f23d91",
    "vancouver",
    "canada",
    "vancouverWeath",
    "vancouverIcon"
);

const parisWeather = new GetWeather("360cccc6e22db8194872d3b393f23d91", "paris", "france", "parisWeath", "parisIcon");

torontoWeather.displayWeather();
montrealWeather.displayWeather();
vancouverWeather.displayWeather();
ottawaWeather.displayWeather();
parisWeather.displayWeather();

const openWeatherPromise = torontoWeather.getPromise;

console.log(openWeatherPromise);
