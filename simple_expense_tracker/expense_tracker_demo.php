<?php

class Transaction {
    protected $id;
    protected $type;
    protected $amount;
    protected $category;

    public function __construct($id, $type, $amount, $category) {
        $this->id = $id;
        $this->type = $type;
        $this->amount = $amount;
        $this->category = $category;
    }

    public function getId() {
        return $this->id;
    }

    public function getType() {
        return $this->type;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getCategory() {
        return $this->category;
    }
}

class TransactionManager {
    protected $transactions = [];

    public function addTransaction($type, $amount, $category) {
        $id = uniqid();
        $transaction = new Transaction($id, $type, $amount, $category);
        $this->transactions[$id] = $transaction;
        $this->saveTransactions();
        echo "Transaction added successfully.\n";
    }

    public function viewTransactions($type = null, $category = null) {
        foreach ($this->transactions as $transaction) {
            if ($type === null || $transaction->getType() === $type) {
                if ($category === null || $transaction->getCategory() === $category) {
                    echo "ID: " . $transaction->getId() . "\n";
                    echo "Type: " . $transaction->getType() . "\n";
                    echo "Amount: " . $transaction->getAmount() . "\n";
                    echo "Category: " . $transaction->getCategory() . "\n\n";
                }
            }
        }
    }

    public function viewTotal($type) {
        $total = 0;
        foreach ($this->transactions as $transaction) {
            if ($transaction->getType() === $type) {
                $total += $transaction->getAmount();
            }
        }
        echo "Total $type: $total\n";
    }

    public function saveTransactions() {
        file_put_contents('transactions.txt', serialize($this->transactions));
    }

    public function loadTransactions() {
        if (file_exists('transactions.txt')) {
            $this->transactions = unserialize(file_get_contents('transactions.txt'));
        }
    }
}

function displayMenu() {
    echo "1. Add Income\n";
    echo "2. Add Expense\n";
    echo "3. View Incomes\n";
    echo "4. View Expenses\n";
    echo "5. View Total Income\n";
    echo "6. View Total Expense\n";
    echo "7. View by Category\n";
    echo "8. Exit\n";
}

$transactionManager = new TransactionManager();
$transactionManager->loadTransactions();

$running = true;

while ($running) {
    displayMenu();
    echo "Enter your choice: ";
    $choice = readline("Enter your choice");
    echo "$choice";

    switch ($choice) {
        case 1:
            echo "Enter amount for income: ";
            $amount = trim(fgets(STDIN));
            echo "Enter category for income: ";
            $category = trim(fgets(STDIN));
            $transactionManager->addTransaction('income', $amount, $category);
            break;
        case 2:
            echo "Enter amount for expense: ";
            $amount = trim(fgets(STDIN));
            echo "Enter category for expense: ";
            $category = trim(fgets(STDIN));
            $transactionManager->addTransaction('expense', $amount, $category);
            break;
        case 3:
            echo "All Incomes:\n";
            $transactionManager->viewTransactions('income');
            break;
        case 4:
            echo "All Expenses:\n";
            $transactionManager->viewTransactions('expense');
            break;
        case 5:
            $transactionManager->viewTotal('income');
            break;
        case 6:
            $transactionManager->viewTotal('expense');
            break;
        case 7:
            echo "Enter category to view: ";
            $category = trim(fgets(STDIN));
            echo "Transactions in category '$category':\n";
            $transactionManager->viewTransactions(null, $category);
            break;
        case 8:
            $running = false; // Set running to false to exit the loop
            echo "Goodbye!\n";
            break;
        default:
            echo "Invalid choice. Please try again.\n";
            break;
    }
}

