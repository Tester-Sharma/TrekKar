
const API_KEY = 'e7b9aba67efda04f340ba1a1c18b6833';
const weather = document.querySelector("#weather");

const getWeather = async(city) => {
    weather.innerHTML = `<h2>Loading...</h2>`;
    const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${API_KEY}&units=metric`;
    try {
        const response = await fetch(url);
        const data = await response.json();
        showWeather(data);
    } catch (error) {
        console.error('Error fetching weather data:', error);
        weather.innerHTML = `<h6>No Internet !</h6>`;
    }
};

const showWeather = (data) => {
    if (data.cod == "404") {
        weather.innerHTML = `<h2>City Not Found</h2>`;
        return;
    }
    weather.innerHTML = `
        <div>
            <img src="https://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png" alt="">
        </div>
        <div>
            <h2>${data.main.temp} ℃</h2>
            <h4>${data.weather[0].main}</h4>
        </div>
    `;
};
