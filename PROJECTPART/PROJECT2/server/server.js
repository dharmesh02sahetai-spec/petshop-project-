
const express = require('express');
const bodyParser = require('body-parser');
const app = express();

app.use(bodyParser.json());

const YOUR_STRIPE_SECRET_KEY = 'sk_tessk_test_51OrcLQSAiyHNro1fB0JZf8itEUs1JGpkBa0gRIsDGdwCThNFZv05oisxaYanFmbx2GidDj0yRHy1OPc3t4aN4CXu00GVNSsr9Rt_123'; // Replace with your actual secret key

const stripe = require('stripe')(YOUR_STRIPE_SECRET_KEY);

app.post('/create-payment-intent', async (req, res) => {
  const { amount } = req.body;

  try {
    const paymentIntent = await stripe.paymentIntents.create({
      amount,
      currency: 'usd',
    });

    res.json({ clientSecret: paymentIntent.client_secret });
  } catch (error) {
    res.status(500).json({ error: error.message });
  }
});

app.listen(3001, () => {
  console.log('Server is running on port 3001');
});
