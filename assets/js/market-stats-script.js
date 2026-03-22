/**
 * Horizon Realty - Market Stats (Exchange Rates)
 * Uses Frankfurter API (free, no API key) for live currency rates.
 * Second API used on site: Open-Meteo Weather (see scripts.js / index).
 */

// Frankfurter API base URL (no key required)
const FRANKFURTER_API = 'https://api.frankfurter.app';

/** Store latest rates for converter */
let currencyRates = {};

/**
 * Fetches latest exchange rates from Frankfurter API (API #1)
 */
async function fetchExchangeRates() {
    try {
        document.getElementById('housePrice').textContent = 'Loading...';
        const response = await fetch(`${FRANKFURTER_API}/latest?from=CAD&to=USD,EUR,GBP`);
        const data = await response.json();

        if (data.rates) {
            const usd = data.rates.USD || 0;
            document.getElementById('housePrice').textContent = `1 CAD = ${usd.toFixed(4)} USD`;
            document.getElementById('lastUpdated').textContent = new Date().toLocaleTimeString();
            currencyRates = { CAD: 1, USD: data.rates.USD, EUR: data.rates.EUR, GBP: data.rates.GBP };
            updateCommonConversions();
        } else {
            document.getElementById('housePrice').textContent = 'Rate unavailable';
        }
    } catch (error) {
        console.error('Error fetching exchange rates:', error);
        document.getElementById('housePrice').textContent = 'Rate unavailable';
        document.getElementById('lastUpdated').textContent = '—';
        // Fallback for demo if API is down
        currencyRates = { CAD: 1, USD: 0.72, EUR: 0.67, GBP: 0.57 };
        updateCommonConversions();
    }
}

/**
 * Updates the "Common Conversions" list with current rates
 */
function updateCommonConversions() {
    if (currencyRates.USD) {
        document.getElementById('cadUsd').textContent = currencyRates.USD.toFixed(4);
        document.getElementById('cadEur').textContent = (currencyRates.EUR || 0).toFixed(4);
        document.getElementById('cadGbp').textContent = (currencyRates.GBP || 0).toFixed(4);
    }
}

/**
 * Runs conversion and displays result in all target currencies
 */
function runConverter() {
    const amount = parseFloat(document.getElementById('amount').value);
    const base = document.getElementById('baseCurrency').value;

    if (isNaN(amount)) {
        document.getElementById('conversionResult').textContent = 'Please enter a valid amount.';
        return;
    }
    if (!currencyRates[base]) {
        document.getElementById('conversionResult').textContent = 'Rates not loaded. Click Refresh.';
        return;
    }

    const lines = [];
    ['USD', 'CAD', 'EUR', 'GBP'].forEach(cur => {
        if (cur === base) return;
        const rate = currencyRates[cur] / currencyRates[base];
        const value = (amount * rate).toFixed(2);
        const sym = cur === 'USD' ? '$' : cur === 'EUR' ? '€' : cur === 'GBP' ? '£' : '$';
        lines.push(`${cur}: ${sym}${value}`);
    });
    document.getElementById('conversionResult').textContent = lines.join('\n');
}

/**
 * Initialize Market Stats page: fetch rates and bind buttons
 */
function initMarketStats() {
    fetchExchangeRates();
    document.getElementById('refreshButton').addEventListener('click', fetchExchangeRates);
    document.getElementById('convertButton').addEventListener('click', runConverter);
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initMarketStats);
} else {
    initMarketStats();
}
