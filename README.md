# Stock-Building-materials-V2

Inventory management is a web application designed to streamline project management tasks by keeping track of the equipment used at construction sites. The application enables project managers to record and track the amount of equipment used by workers each day, including the depletion of equipment specific to each specialty. The project administrator can also add new workers, assign them unique login credentials, and monitor their work on the site. This system helps the administrator to accurately monitor the quantity of equipment used at each location, as well as the worker responsible for its use.

# Technologies Used

This project was built using the following technologies:

- Laravel: A PHP web application framework used for back-end development
- Vite: A build tool used for front-end development with React
- Tailwind CSS: A utility-first CSS framework used for styling the application

# Installation

**1. Clone the repository from GitHub:**

    git clone https://github.com/salahelfatimi/Stock-Building-materials-V2.git

**2. Install dependencies:**

*For backend folder in Laravel:*

    cd Back_end
    composer install

*For frontend folder in React:*

    cd Front_end
    npm install
 
*Run the migrations:*
 
    cd Back_end
    php artisan migrate
 

# Usage

**1. Start the backend server:**

    cd Back_end
    php artisan serve

**2. Start the frontend server:**

    cd Front_end
    npm run dev

**3. Open the web application in your browser by visiting :**

    http://127.0.0.1:5173/
            
# Default Admin Login Credentials

After running the database migrations, you can login to the admin account with the following credentials:

- Username: root
- Password: 1234

Please make sure to change the admin login credentials as soon as possible for security purposes.

# Contributing

   Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

   Please make sure to update tests as appropriate.

