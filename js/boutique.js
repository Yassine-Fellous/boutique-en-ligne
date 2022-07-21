// Système de paiement Stripe
window.onload = () =>
{
    // les variables
    let stripe = Stripe('pk_test_51KUAgRJcdqGu57WBxNMKP4B4bOIAsMdZx4iQiNzPCF53TxMDBFjqApaqTEIPbkaUy0ZpIjTJlP7W8UXeP1yZrooH00S4xt7g0s') // Clé publique
    let elements = stripe.elements()
    let redirect = "../paiement-success.php"
    // Objets de la page
    let cardHolderName = document.getElementById("cardholder-name")
    let cardButton = document.getElementById("card-button")
    let clientSecret = cardButton.dataset.secret;
    // Formulaire CB
    let card = elements.create("card")
    card.mount("#card-elements")
    // Gestion de la saisie
    card.addEventListener("change", (event) =>
    {
        let displayError = document.getElementById("card-errors")
        if(event.error)
        {
            displayError.textContent = event.error.message;
        }
        else
        {
            displayError.textContent = "";
        }
    }
    )
    // Gestion de paiement
    cardButton.addEventListener("click", () =>
    {
        stripe.handleCardPayment(clientSecret, card, {payment_method_data: {billing_details: {name: cardHolderName.value}}})
        .then((result) =>
        {
            if(result.error)
            {
                document.getElementById("errors").innerText = result.error.message
            }
            else
            {
                document.location.href = redirect
            }
        }
        )
    }
    )
}