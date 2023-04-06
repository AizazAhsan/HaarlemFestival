<?php

class invoice {

    public string $clientName; //client name = username
    public int $invoiceNumber; //invoice number = order number
    public string $invoiceDate; //invoice date = order date
    public int $phoneNumber;
    public string $address;
    public string $email;
    public float $subTotalAmount; //per line item
    public float $totalAmount; //total amount = subtotal amount + VAT
    public int $VAT; //VAT = 21% or 9% of subtotal amount
    public string $paymentDate;

    /**
     * @return string
     */
    public function getInvoiceDate(): string
    {
        $invoiceDate = $this->invoiceDate;
        if ($invoiceDate !== null) {
            $invoiceDate = date('Y-m-d', strtotime($invoiceDate));
            $this->setInvoiceDate($invoiceDate);
        }
        return $invoiceDate;
    }

    /**
     * @param string $invoiceDate
     */
    public function setInvoiceDate(string $invoiceDate): void
    {
        $invoiceDate = date('Y-m-d', strtotime($invoiceDate));
        $this->invoiceDate = $invoiceDate;
    }

    /**
     * @return string
     */
    public function getClientName(): string
    {
        return $this->clientName;
    }

    /**
     * @return int
     */
    public function getInvoiceNumber(): int
    {
        return $this->invoiceNumber;
    }

    /**
     * @return int
     */
    public function getPhoneNumber(): int
    {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return float
     */
    public function getSubTotalAmount(): float
    {
        return $this->subTotalAmount;
    }

    /**
     * @return float
     */
    public function getTotalAmount(): float
    {
        return $this->totalAmount;
    }

    /**
     * @return int
     */
    public function getVAT(): int
    {
        return $this->VAT;
    }

    /**
     * @return string
     */
    public function getPaymentDate(): string
    {
        return $this->paymentDate;
    }

    /**
     * @param string $clientName
     */
    public function setClientName(string $clientName): void
    {
        $this->clientName = $clientName;
    }

    /**
     * @param int $invoiceNumber
     */
    public function setInvoiceNumber(int $invoiceNumber): void
    {
        $this->invoiceNumber = $invoiceNumber;
    }

    /**
     * @param int $phoneNumber
     */
    public function setPhoneNumber(int $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param float $subTotalAmount
     */
    public function setSubTotalAmount(float $subTotalAmount): void
    {
        $this->subTotalAmount = $subTotalAmount;
    }

    /**
     * @param float $totalAmount
     */
    public function setTotalAmount(float $totalAmount): void
    {
        $this->totalAmount = $totalAmount;
    }

    /**
     * @param int $VAT
     */
    public function setVAT(int $VAT): void
    {
        $this->VAT = $VAT;
    }

    /**
     * @param string $paymentDate
     */
    public function setPaymentDate(string $paymentDate): void
    {
        $this->paymentDate = $paymentDate;
    }



}
