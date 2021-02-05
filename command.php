<?php
// Command
interface Command {
    public function execute();
}

class GetCompanyCommand implements Command {
    private $stockSim;
    public function __construct($stockSim) {
        $this->stockSim = $stockSim;
    }

    public function execute() {
        $this->stockSim->getCompany();
    }
}

class UpdatePriceCommand implements Command {
    private $stockSim;
    public function __construct($stockSim) {
        $this->stockSim = $stockSim;
    }

    public function execute() {
        $this->stockSim->updatePrice();
    }
}

// Receiver
class StockSim {
    public function getCompany() {

    }

    public function updatePrice() {

    }

    public function buyStock() {
        
    }
}

// Client
// in == String getAction() from client
$in = "UpdatePriceCommand";

// Invoker
if (class_exists($in)) {
    $comm = new $in(new StockSim());
    
} else {
    throw new Exception("...");
}

$comm->execute();

/*
class Stack {
    private $stack;
    private $capacity;

    public function __construct() {
        $this->stack = array();
        $this->capacity = 100;
    }

    public function push($item) {
        if (count($this->stack) < $this->capacity) {
            array_push($this->stack, $item);
        } else {
            echo "Stack is full. Array size is doubled";
            // double the array size and copy all items to the array
            $this->capacity *= 2; 
            array_push($this->stack, $item);
        }
    }

    public function pop() {
        if ($this->isEmpty())
            echo "Stack is empty";
        else
            return array_pop($this->stack);
    }

    public function peek() {
        return end($this->stack);
    }

    public function isEmpty() {
        return empty($this->stack);
    }
}

// Receiver
class Account {
    private $balance;
    private $no;
    public function __construct($no, $balance) {
        $this->no = $no;
        $this->balance = $balance;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function withdraw($amount) {
        $this->balance -= $amount;
    }

    public function deposit($amount) {
        $this->balance += $amount;
    }

    public function getAccountNumber() {
        return $this->no;
    }
}

// Command
interface Command {
    public function execute();
    public function undo();
}

class DepositCommand implements Command{
    private $acc;
    private $amount;
    
    public function __construct(Account $acc, $amount) {
        $this->acc = $acc;
        $this->amount = $amount;
    }
    public function execute() {
        echo "Before deposit, balance = ".$this->acc->getBalance()."<br>";
        $this->acc->deposit($this->amount);
        echo "After deposit, balance = ".$this->acc->getBalance()."<br>";
    }
    public function undo(){
        echo "Before undo deposit, balance = ".$this->acc->getBalance()."<br>";
        $this->acc->withdraw($this->amount);
        echo "After undo deposit, balance = ".$this->acc->getBalance()."<br>";
    }
}

class WithdrawCommand implements Command{
    private $acc;
    private $amount;
    
    public function __construct(Account $acc, $amount) {
        $this->acc = $acc;
        $this->amount = $amount;
    }

    public function execute() {
        echo "Before withdraw, balance = ".$this->acc->getBalance()."<br>";
        $this->acc->withdraw($this->amount);
        echo "After withdraw, balance = ".$this->acc->getBalance()."<br>";
    }
    public function undo(){
        echo "Before undo withdraw, balance = ".$this->acc->getBalance()."<br>";
        $this->acc->deposit($this->amount);
        echo "After undo withdraw, balance = ".$this->acc->getBalance()."<br>";
    }
}

$balance = [100.0, 200.0];
$amount = [50.0, 20.0];

$commandStack = new Stack();

$acc = [];
$command = [];
for ($i = 0; $i < 2; $i++) {
    array_push($acc, new Account($i, $balance[$i]));
}

array_push($command, new DepositCommand($acc[0], 30.0));
array_push($command, new WithdrawCommand($acc[1], 40.0));
array_push($command, new WithdrawCommand($acc[0], 20.0));
array_push($command, new DepositCommand($acc[1], 30.0));

echo "Start Execute<br>";
for ($i = 0; $i < count($command); $i++) {
    $command[$i]->execute();
    $commandStack->push($command[$i]);
}
echo "<br>";
echo "Start Undo<br>";
while (!$commandStack->isEmpty()) {
    $c = $commandStack->pop();
    $c->undo();
}
*/