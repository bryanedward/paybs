import React from "react";
import ReactDOM from "react-dom/client";
import {
    Elements,
    AddressElement,
    LinkAuthenticationElement,
    PaymentElement,
    ElementsConsumer,
    useStripe,
    useElements,
    CardElement,
} from "@stripe/react-stripe-js";

import { loadStripe } from "@stripe/stripe-js";
import axios from "axios";

const stripePromise = loadStripe(
    "pk_test_51GzWBTJXQpzchPKb2g2azvmCYToOSpwLC9xI9G5gVWqcDPzjahJf0WdFv5wq8K59wvUh86dvdjZfC4R7F9BS9WQM00oaHiDNyl"
);

const CheckoutForm = () => {
    const stripe = useStripe();
    const elements = useElements();

    const handleSubmit = async (event) => {
        event.preventDefault;

        const flow = await axios.post("api/payment_flow");

        dd(flow);

        const { error, paymentMethod } = await stripe.confirmPayment({
            // confirmParams: {
            //     // Make sure to change this to your payment completion page
            //     return_url: "http://localhost:3000",
            // },
            // clientSecret: `pm_1OggGTJXQpzchPKbjXCnAUKa`,
            type: "card",
            card: elements.getElement("payment"),
        });

        console.log("🚀 ~ handleSubmit ~ paymentMethod:", paymentMethod.id);
    };

    return (
        <form onSubmit={handleSubmit}>
            <PaymentElement />
            <button type="submit">Submit</button>
        </form>
    );
};

const MyComponent = () => {
    return <div>ok</div>;
};

export default function Principal() {
    // const options = {
    //     // passing the client secret obtained from the server
    //     clientSecret:
    //         "{{sk_test_51GzWBTJXQpzchPKbrTpU5yI9B3BOvrJfgAPoNNt5OStBaZjoxJiUdaOSAKBfBeEh5KeKMmlVWWrP22WnDVtEt6KI00jzYWQlUc}}",
    // };
    return (
        <Elements
            stripe={stripePromise}
            options={{
                appearance: {
                    theme: "night",
                    labels: "floating",
                },
                mode: "payment",
                locale: "es",
                currency: "usd",
                amount: 100,
            }}
        >
            {/* <Elements stripe={stripePromise} options={options}>
                <h1> Container !</h1>
                <CheckoutForm />
            </Elements> */}
            <CheckoutForm />
        </Elements>
    );
}

const root = ReactDOM.createRoot(document.getElementById("hello-react"));
root.render(
    <React.StrictMode>
        <Principal />
    </React.StrictMode>
);
