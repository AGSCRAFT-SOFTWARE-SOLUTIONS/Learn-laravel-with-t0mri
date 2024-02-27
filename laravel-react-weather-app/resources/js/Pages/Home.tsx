import { Head } from "@inertiajs/react";
import { FormEvent, useState } from "react";

export default () => {
    const [weatherInfo, setWeatherInfo] = useState({
        min: "",
        max: "",
        avg: "",
    });
    const fetchWeatherInfo = async (e: any) => {
        e.preventDefault();

        const url = `https://forecast9.p.rapidapi.com/rapidapi/forecast/${e.target.location.value}/summary/`;
        const options = {
            method: "GET",
            headers: {
                "X-RapidAPI-Key":
                    "4d0e575490mshdd9bb5ce2a150f8p1e19dajsnb9968f9353f7",
                "X-RapidAPI-Host": "forecast9.p.rapidapi.com",
            },
        };

        const response = await fetch(url, options);
        let result: any = await response.text();
        result = JSON.parse(result);
        try {
            setWeatherInfo(result.forecast.items[0].temperature);
        } catch (err) {
            alert("Something went wrong!, Try different location");
        }
    };
    return (
        <>
            <Head title="Home" />
            <section className="grid place-content-center min-h-screen gap-2">
                <h1 className="text-4xl font-bold">Weather</h1>
                <form className="flex gap-2" onSubmit={fetchWeatherInfo}>
                    <input
                        type="text"
                        name="location"
                        className="rounded-md border-none bg-gray-100 hover:bg-gray-200"
                    />
                    <button className="bg-green-100 hover:bg-green-200 active:bg-green-300 p-2 rounded-md">
                        Get
                    </button>
                </form>
                <div className="grid grid-cols-2 gap-2">
                    <span className="bg-blue-50 text-center">min</span>
                    <span className="bg-blue-50 text-center">
                        {weatherInfo.min}
                    </span>
                    <span className="bg-red-50 text-center">max</span>
                    <span className="bg-red-50 text-center">
                        {weatherInfo.max}
                    </span>
                    <span className="bg-green-50 text-center">avg</span>
                    <span className="bg-green-50 text-center">
                        {weatherInfo.avg ??
                            (+weatherInfo.min + +weatherInfo.max) / 2}
                    </span>
                </div>
            </section>
        </>
    );
};
