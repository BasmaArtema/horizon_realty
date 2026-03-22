/**
 * Horizon Realty - Market Stats (Exchange Rates)
 * Uses Frankfurter API (free, no API key) for live currency rates.
 * This page shows one reference rate, a conversion utility, and a bar chart.
 */

const FRANKFURTER_API = 'https://api.frankfurter.app';
const SUPPORTED_CURRENCIES = ['USD', 'CAD', 'EUR', 'GBP'];

/** Store latest rates for converter and chart rendering */
let currencyRates = {};

function formatCurrencyLabel(currency, value) {
    return `${currency} ${value.toFixed(2)}`;
}

function getConversionValue(amount, base, target) {
    if (!currencyRates[base] || !currencyRates[target]) {
        return 0;
    }

    return amount * (currencyRates[target] / currencyRates[base]);
}

/**
 * Render a simple SVG bar chart from the selected amount/base currency.
 */
function renderCurrencyChart() {
    const chart = document.getElementById('currencyChart');
    const summary = document.getElementById('chartSummary');
    const amountInput = document.getElementById('amount');
    const baseSelect = document.getElementById('baseCurrency');

    if (!chart || !summary || !amountInput || !baseSelect) {
        return;
    }

    const amount = parseFloat(amountInput.value);
    const base = baseSelect.value;

    if (isNaN(amount) || amount <= 0 || !currencyRates[base]) {
        chart.innerHTML = '';
        summary.textContent = 'Enter a valid amount to compare the supported currencies.';
        return;
    }

    const values = SUPPORTED_CURRENCIES.map(currency => ({
        currency,
        value: getConversionValue(amount, base, currency)
    }));

    const maxValue = Math.max(...values.map(item => item.value), 1);
    const chartWidth = 760;
    const chartHeight = 320;
    const leftAxis = 68;
    const bottomAxis = 48;
    const topPadding = 24;
    const barWidth = 96;
    const gap = 54;

    const gridLines = [0.25, 0.5, 0.75, 1];
    const gridMarkup = gridLines.map(ratio => {
        const y = topPadding + (chartHeight - topPadding - bottomAxis) * (1 - ratio);
        const label = (maxValue * ratio).toFixed(0);
        return `
            <line x1="${leftAxis}" y1="${y}" x2="${chartWidth - 24}" y2="${y}" class="chart-grid-line"></line>
            <text x="${leftAxis - 12}" y="${y + 5}" class="chart-axis-label">${label}</text>
        `;
    }).join('');

    const barsMarkup = values.map((item, index) => {
        const x = leftAxis + 30 + index * (barWidth + gap);
        const barAreaHeight = chartHeight - topPadding - bottomAxis;
        const barHeight = Math.max((item.value / maxValue) * barAreaHeight, 8);
        const y = chartHeight - bottomAxis - barHeight;
        const isBase = item.currency === base;
        const barClass = isBase ? 'chart-bar chart-bar-base' : 'chart-bar';

        return `
            <g>
                <rect x="${x}" y="${y}" width="${barWidth}" height="${barHeight}" rx="16" class="${barClass}"></rect>
                <text x="${x + barWidth / 2}" y="${y - 10}" text-anchor="middle" class="chart-value-label">${formatCurrencyLabel(item.currency, item.value)}</text>
                <text x="${x + barWidth / 2}" y="${chartHeight - 18}" text-anchor="middle" class="chart-axis-label">${item.currency}</text>
            </g>
        `;
    }).join('');

    chart.innerHTML = `
        <line x1="${leftAxis}" y1="${topPadding}" x2="${leftAxis}" y2="${chartHeight - bottomAxis}" class="chart-axis-line"></line>
        <line x1="${leftAxis}" y1="${chartHeight - bottomAxis}" x2="${chartWidth - 24}" y2="${chartHeight - bottomAxis}" class="chart-axis-line"></line>
        ${gridMarkup}
        ${barsMarkup}
    `;

    summary.textContent = `${amount.toLocaleString()} ${base} compared across USD, CAD, EUR, and GBP at the latest available rates.`;
}

/**
 * Fetch latest exchange rates from Frankfurter API.
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
            renderCurrencyChart();
        } else {
            document.getElementById('housePrice').textContent = 'Rate unavailable';
        }
    } catch (error) {
        console.error('Error fetching exchange rates:', error);
        document.getElementById('housePrice').textContent = 'Rate unavailable';
        document.getElementById('lastUpdated').textContent = '--';
        // Demo fallback values keep the page usable if the live API is unavailable.
        currencyRates = { CAD: 1, USD: 0.72, EUR: 0.67, GBP: 0.57 };
        updateCommonConversions();
        renderCurrencyChart();
    }
}

/**
 * Updates the "Common Conversions" list with current rates.
 */
function updateCommonConversions() {
    if (currencyRates.USD) {
        document.getElementById('cadUsd').textContent = currencyRates.USD.toFixed(4);
        document.getElementById('cadEur').textContent = (currencyRates.EUR || 0).toFixed(4);
        document.getElementById('cadGbp').textContent = (currencyRates.GBP || 0).toFixed(4);
    }
}

/**
 * Runs conversion and displays result in all target currencies.
 */
function runConverter() {
    const amount = parseFloat(document.getElementById('amount').value);
    const base = document.getElementById('baseCurrency').value;

    if (isNaN(amount)) {
        document.getElementById('conversionResult').textContent = 'Please enter a valid amount.';
        renderCurrencyChart();
        return;
    }
    if (!currencyRates[base]) {
        document.getElementById('conversionResult').textContent = 'Rates not loaded. Click Refresh.';
        return;
    }

    const lines = [];
    SUPPORTED_CURRENCIES.forEach(cur => {
        if (cur === base) return;
        const value = getConversionValue(amount, base, cur).toFixed(2);
        lines.push(`${cur}: ${value}`);
    });
    document.getElementById('conversionResult').textContent = lines.join('\n');
    renderCurrencyChart();
}

/**
 * Initialize Market Stats page: fetch rates and bind controls.
 */
function initMarketStats() {
    fetchExchangeRates();

    const refreshButton = document.getElementById('refreshButton');
    const convertButton = document.getElementById('convertButton');
    const amountInput = document.getElementById('amount');
    const baseSelect = document.getElementById('baseCurrency');

    if (refreshButton) {
        refreshButton.addEventListener('click', fetchExchangeRates);
    }
    if (convertButton) {
        convertButton.addEventListener('click', runConverter);
    }
    if (amountInput) {
        amountInput.addEventListener('input', renderCurrencyChart);
    }
    if (baseSelect) {
        baseSelect.addEventListener('change', () => {
            runConverter();
        });
    }
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initMarketStats);
} else {
    initMarketStats();
}
