<?php

require __DIR__ . '/../repository/invoiceRepository.php';

class invoiceService
{
    public $invoiceRepository;
    public function __construct()
    {
        $this->invoiceRepository = new InvoiceRepository();
    }
}