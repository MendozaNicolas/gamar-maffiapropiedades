// attr currency-format="usd"

document.querySelectorAll("[currency-format]").forEach((element) => {
    const currency = element.getAttribute("currency-format");
    const value = element.innerHTML;
    const formatter = new Intl.NumberFormat("en-US", {
        style: "currency",
        currency: currency,
    });
    element.innerHTML = formatter.format(value);
});
