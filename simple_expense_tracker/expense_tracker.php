<?php

    //Description: A simple CLI application for adding income, and expenses, viewing, and updating different kinds of incomes and expenses. There should be a Category for each income and expense. Use OOP concepts. Make sure to store the data in files so that the data persists.


    class Transaction {

        protected $id;
        protected $type;
        protected $amount;
        protected $category;
        
        
        

        public function __construct($id, $type, $category, $amount){

            $this->id = $id;
            $this->type = $type;
            $this->amount = $amount;
            $this->category = $category;

        }

        public function getId(){

            return $this->id;
        }

        public function getType() {

            return $this->type;
        }

        public function getAmount() {

            return $this->category;
        }

        public function getCategory() {

            return $this->category;
        }



    }


    class TransactionManager {

        protected $transactions = [];
        protected $incomeCategory = [];
        protected $expenseCategory = [];


        public function addIncomeCategory($category){

            $this->incomeCategory[] = $category;
        }

        public function addExpenseCategory($category) {

            $this->expenseCategory[] = $category;

        }


        public function addTransaction($type, $amount, $category) {

            $id = uniqid();
            $transaction = new Transaction($id, $type, $amount, $category);
            $this-> transactions[$id] = $transaction;
            $this-> saveTransactions();
            echo "Transaction added successfully";

        }

        public function viewTransaction($type = null, $category = null){

            foreach($this->transactions as $transaction){

                if($type === null || $transaction->getType() === $type){

                    if($category === null || $transaction->getCategory() === $category){

                        echo "ID : " .$transaction->getId(). "\n";
                        echo "Type : " .$transaction->getType(). "\n";
                        echo "Amount : " .$transaction->getAmount() ."\n";
                        echo "Category : " .$transaction->getCategory(). "\n"; 

                    }
                }
            }
            


        }


        public function viewTotal($type) {

            $total = 0;
            foreach ($this->transactions as $transaction) {

                if($transaction->getType() === $type){

                    $total += $transaction->getAmount();
                }
            }

        }

        public function saveTransactions() {

            file_put_contents('transactions.csv', serialize($this->transactions));

        }

        public function loadTransactions() {

            if(!file_exists('transactions.csv')) {

                $this->transactions = unserialize(file_get_contents('transactions.csv'));
            }
        }



        public function getIncomeCategories() {

             return $this->incomeCategory;

        }

        public function getExpenseCategories() {

            return $this->expenseCategory;
        }

        public function deductExpenseFromCategory( $amount, $category) {


            //Here I use two parameter for check which expense is deduction from income category. Here I use in_array() for searcing and check if the category exists in the income category then return deducted value.

            //Here one thing in_array() is perform like neddle and hyshtack
            if(in_array($category, $this->incomeCategory)) {
                
                $this->addTransaction('expense', $amount, $category);

            } else {

                echo("Category not found in income category");
            }

        }


       
        

    }


    function displayMenu($transactionManager) {

        echo "1. add Income \n";
        echo "2. Add Expense \n";
        echo "3. View Income \n";
        echo "4. View Expense \n";
        echo "5. View category \n";
        echo "6. Exit \n";

    }

    $transactionManager = new TransactionManager();

    $transactionManager->loadTransactions();

    $transactionManager->addIncomeCategory('Salary');
    $transactionManager->addIncomeCategory('Bonus');
    $transactionManager->addExpenseCategory('Rent');
    $transactionManager->addExpenseCategory('Food');
    $transactionManager->addExpenseCategory('Other Expenses');
    


        while(true) {

        displayMenu($transactionManager);
        $choice =  readline("Enter your choice : ");


            switch($choice) {

                case 1:
                   
                    $amount = readline("Enter amount for Income");
                    $category = readline("Enter category for Income : ");
                    foreach($transactionManager->getIncomeCategories() as $key => $incomeCategory){

                        echo "$key + 1" . "$incomeCategory \n";
                    }

                    if( $category < 1 || $category > count($transactionManager->getIncomeCategories())){

                        echo "";

                    }

                    $transactionManager->addTransaction('income', $amount, $category);
                    break;

                case 2;
                    $amount = readline("Enter amount for expenses");
                    $category = readline("Enter category for expenses");
                    foreach($transactionManager->getExpenseCategories() as $key => $expenseCategory){

                        echo "$key + 1" ."$expenseCategory \n";
                    }
                    $transactionManager->addTransaction('expense', $amount, $category);
                    
                

                case 3:
                    echo "Total Income: \n";
                    $transactionManager->addIncomeCategory('income');
                    break;

                case 4:
                    echo "Total Expenses : \n";
                    $transactionManager->viewTotal('expense');

                case 5:
                    echo "View all categories : \n";
                    echo "-----Income Ctegories--------- \n";
                    foreach ($transactionManager->getIncomeCategories() as $category) {

                        echo "$category \n";
                    }

                    echo "-----Expense Ctegories-------- \n";

                    foreach ($transactionManager->getExpenseCategories() as $expenseCategory){

                        echo "$expenseCategory \n";
                    }
                    break;

            }

        }



?>