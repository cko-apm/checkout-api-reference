// To run this script use the command 'npm run sync-generated-apm-specs' on the IRE VPN Profile.

var specs = require('./sync-specs');

specs.syncPaymentRequest('Sofort', 'https://apm-sofort.cko-sbox.ckotech.co/relations/gw/pay');
specs.syncPaymentResponse('Sofort', 'https://apm-sofort.cko-sbox.ckotech.co/relations/gw/payment');

specs.syncPaymentRequest('Qpay', 'http://qa-gateway-internal.cko.lon/qpay-internal/relations/gw/pay');
specs.syncPaymentResponse('Qpay', 'http://qa-gateway-internal.cko.lon/qpay-internal/relations/gw/payment');

specs.syncPaymentRequest('Giropay', 'http://qa-gateway-internal.cko.lon/giropay-internal/giropay/relations/gw/pay');
specs.syncPaymentResponse('Giropay', 'http://qa-gateway-internal.cko.lon/giropay-internal/giropay/relations/gw/payment');

specs.syncPaymentRequest('Eps', 'http://qa-gateway-internal.cko.lon/giropay-internal/eps/relations/gw/pay');
specs.syncPaymentResponse('Eps', 'http://qa-gateway-internal.cko.lon/giropay-internal/eps/relations/gw/payment');