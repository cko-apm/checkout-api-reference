// To run this script use the command 'npm run sync-generated-apm-specs' on the IRE VPN Profile.

var specs = require('./sync-specs');

specs.syncPaymentRequest('Sofort', 'https://apm-sofort.cko-sbox.ckotech.co/relations/gw/pay');
specs.syncPaymentResponse('Sofort', 'https://apm-sofort.cko-sbox.ckotech.co/relations/gw/payment');

specs.syncPaymentRequest('Qpay', 'http://qa-gateway-internal.cko.lon/qpay-internal/relations/gw/pay');
specs.syncPaymentResponse('Qpay', 'http://qa-gateway-internal.cko.lon/qpay-internal/relations/gw/payment');