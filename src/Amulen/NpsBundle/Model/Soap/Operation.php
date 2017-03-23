<?php

namespace Amulen\NpsBundle\Model\Soap;

/**
 * NPS Soap Operation.
 */
class Operation
{
    const PAY_ONLINE_2P = "PayOnLine_2p";
    const AUTHORIZE_2P = "Authorize_2p";
    const QUERY_TXS = "QueryTxs";
    const SIMPLE_QUERY_TX = "SimpleQueryTx";
    const REFUND = "Refund";
    const CAPTURE = "Capture";
    const AUTHORIZE_3P = "Authorize_3p";
    const BANK_PAYMENT_3P = "BankPayment_3p";
    const CASH_PAYMENT_3P = "CashPayment_3p";
    const CHANGE_SECRET_KEY = "ChangeSecretKey";
    const FRAUD_SCREENING = "FraudScreening";
    const NOTIFY_FRAUD_SCREENING_REVIEW = "NotifyFraudScreeningReview";
    const PAY_ONLINE_3P = "PayOnLine_3p";
    const SPLIT_AUTHORIZE_3P = "SplitAuthorize_3p";
    const SPLIT_PAY_ONLINE_3P = "SplitPayOnLine_3p";
    const BANK_PAYMENT_2P = "BankPayment_2p";
    const SPLIT_PAY_ONLINE_2P = "SplitPayOnLine_2p";
}