<?php
class BankAccounts2
{
    protected $accounts;

    public function __construct($accounts)
    {
        $this->accounts = $accounts;
    }

    public function filterBy($accountType)
    {

        $filtered = array_filter($this->accounts, function($account) use ($accountType) {
            return $this->isOfType($accountType, $account);
        });

        return $filtered;

    }

    /**
     * @param $accountType
     * @param $account
     * @return bool
     */
    public function isOfType($accountType, $account)
    {
        return $account->type() == $accountType && $account->isActive();
    }
}


class Account2 {

    protected $type;

    private function __construct($type)
    {
        $this->type = $type;
    }

    public static function open($type)
    {
        return new static($type);
    }

    public function type()
    {
        return $this->type;
    }

    public function isActive()
    {
        return true;
    }
}

$accounts = [
    Account2::open('Current'),
    Account2::open('Current'),
    Account2::open('Saving'),
    Account2::open('Saving')
];

$accounts = new BankAccounts2($accounts);

$savings = $accounts->filterBy('Saving');

var_dump($savings);



