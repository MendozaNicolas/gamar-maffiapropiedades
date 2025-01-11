// attr currency-format="usd"

document.querySelectorAll("[currency-format]").forEach((element) => {
    const currency = element.getAttribute("currency-format");
    const countryId = element.getAttribute("country-id");
    const value = element.innerHTML;
    const formatter = new Intl.NumberFormat(countryId);
    element.innerHTML = formatter.format(value);
});
