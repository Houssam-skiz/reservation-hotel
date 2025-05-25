<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Reservation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #1a1a1a;
            color: #ffffff;
            min-height: 100vh;
            padding: 20px;
        }

        .rev {
            display: flex;
            gap: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        nav {
            flex: 0 0 350px;
            background-color: #2d2d2d;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            height: fit-content;
            transition: transform 0.3s ease;
        }

        nav:hover {
            transform: translateY(-5px);
        }

        nav img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid #4a4a4a;
            margin: 0 auto 20px;
            display: block;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        nav img:hover {
            transform: scale(1.05);
        }

        h4 {
            font-size: 28px;
            margin-bottom: 25px;
            color: #ffffff;
            text-transform: capitalize;
            text-align: center;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #cccccc;
            font-size: 16px;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 12px;
            background-color: #3d3d3d;
            border: 1px solid #4a4a4a;
            border-radius: 6px;
            color: #ffffff;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #4CAF50;
            background-color: #454545;
            box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.2);
        }

        .error-message {
            color: #ff4444;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }

        .form-group.error input {
            border-color: #ff4444;
        }

        .form-group.error .error-message {
            display: block;
        }

        .buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }

        button {
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        button::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        button:active::after {
            width: 200px;
            height: 200px;
        }

        button[type="reset"] {
            background-color: #4a4a4a;
            color: #ffffff;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: #ffffff;
        }

        .social-icons {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .social-icons i {
            font-size: 24px;
            color: #cccccc;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .social-icons i:hover {
            color: #4CAF50;
            transform: translateY(-2px) scale(1.1);
        }

        .info {
            flex: 1;
            background-color: #2d2d2d;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .search-bar {
            margin-bottom: 20px;
            position: relative;
        }

        .search-bar input {
            padding-left: 40px;
        }

        .search-bar i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #cccccc;
        }

        .table-container {
            overflow-x: auto;
            margin-top: 10px;
            border-radius: 6px;
            background-color: #3d3d3d;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 10px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #4a4a4a;
        }

        th {
            background-color: #3d3d3d;
            color: #ffffff;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 0.5px;
            cursor: pointer;
        }

        th:hover {
            background-color: #454545;
        }

        td {
            background-color: #2d2d2d;
            font-size: 15px;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background-color: #363636;
        }

        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            display: inline-block;
        }

        .status.valid {
            background-color: rgba(76, 175, 80, 0.2);
            color: #4CAF50;
        }

        .status.expired {
            background-color: rgba(244, 67, 54, 0.2);
            color: #f44336;
        }

        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 25px;
            background-color: #4CAF50;
            color: white;
            border-radius: 6px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: none;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .rev {
                flex-direction: column;
            }
            
            nav {
                flex: none;
                width: 100%;
            }

            .table-container {
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="toast" id="toast"></div>
    <div class="rev">
        <nav>
            <img src="image1.jpg" alt="logo" id="logo">
            <h4>Reservation</h4>
            <form id="reservationForm" action="" method="post">
                <div class="form-group">
                    <label>Name Customer</label>
                    <input type="text" name="name" id="name" required>
                    <div class="error-message">Please enter a valid name</div>
                </div>
                
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="email" required>
                    <div class="error-message">Please enter a valid email address</div>
                </div>
                
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" id="address">
                    <div class="error-message">Please enter a valid address</div>
                </div>
                
                <div class="form-group">
                    <label>Phone</label>
                    <input type="tel" name="phone" id="phone" required>
                    <div class="error-message">Please enter a valid phone number</div>
                </div>
                
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" id="date" required>
                    <div class="error-message">Please select a valid future date</div>
                </div>
                
                <div class="buttons">
                    <button type="reset" id="resetBtn">Reset</button>
                    <button type="submit" name="add">Add</button>
                </div>
            </form>
            <div class="social-icons">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-whatsapp"></i>
            </div>
        </nav>
        
        <div class="info">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Search reservations...">
            </div>
            <div class="table-container">
                <table id="reservationsTable">
                    <thead>
                        <tr>
                            <th data-sort="id">ID ↕</th>
                            <th data-sort="name">Name ↕</th>
                            <th data-sort="email">Email ↕</th>
                            <th data-sort="address">Address ↕</th>
                            <th data-sort="phone">Phone ↕</th>
                            <th data-sort="date">Date ↕</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include 'form1.php'; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Form validation
            const form = document.getElementById('reservationForm');
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const phoneInput = document.getElementById('phone');
            const dateInput = document.getElementById('date');

            // Show toast message
            function showToast(message, success = true) {
                const toast = document.getElementById('toast');
                toast.textContent = message;
                toast.style.backgroundColor = success ? '#4CAF50' : '#f44336';
                toast.style.display = 'block';
                
                setTimeout(() => {
                    toast.style.display = 'none';
                }, 3000);
            }

            // Validate form
            function validateForm(e) {
                let isValid = true;
                
                // Name validation
                if (!/^[a-zA-Z\s]{2,50}$/.test(nameInput.value)) {
                    setError(nameInput, 'Name should be 2-50 characters long and contain only letters');
                    isValid = false;
                } else {
                    clearError(nameInput);
                }

                // Email validation
                if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)) {
                    setError(emailInput, 'Please enter a valid email address');
                    isValid = false;
                } else {
                    clearError(emailInput);
                }

                // Phone validation
                if (!/^\+?[\d\s-]{10,}$/.test(phoneInput.value)) {
                    setError(phoneInput, 'Please enter a valid phone number');
                    isValid = false;
                } else {
                    clearError(phoneInput);
                }

                // Date validation
                const selectedDate = new Date(dateInput.value);
                const today = new Date();
                today.setHours(0, 0, 0, 0);

                if (selectedDate < today) {
                    setError(dateInput, 'Please select a future date');
                    isValid = false;
                } else {
                    clearError(dateInput);
                }

                if (!isValid) {
                    e.preventDefault();
                    showToast('Please fix the errors in the form', false);
                }
            }

            function setError(input, message) {
                const formGroup = input.parentElement;
                const errorDisplay = formGroup.querySelector('.error-message');
                formGroup.classList.add('error');
                errorDisplay.textContent = message;
            }

            function clearError(input) {
                const formGroup = input.parentElement;
                formGroup.classList.remove('error');
            }

            form.addEventListener('submit', validateForm);

            // Search functionality
            const searchInput = document.getElementById('searchInput');
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const rows = document.querySelectorAll('#reservationsTable tbody tr');

                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });

            // Sorting functionality
            let sortDirection = {};
            
            document.querySelectorAll('th[data-sort]').forEach(th => {
                th.addEventListener('click', () => {
                    const column = th.dataset.sort;
                    sortDirection[column] = !sortDirection[column];
                    
                    const tbody = document.querySelector('#reservationsTable tbody');
                    const rows = Array.from(tbody.querySelectorAll('tr'));
                    
                    rows.sort((a, b) => {
                        let aVal = a.children[th.cellIndex].textContent;
                        let bVal = b.children[th.cellIndex].textContent;
                        
                        if (column === 'id') {
                            aVal = parseInt(aVal);
                            bVal = parseInt(bVal);
                        } else if (column === 'date') {
                            aVal = new Date(aVal);
                            bVal = new Date(bVal);
                        }
                        
                        if (sortDirection[column]) {
                            return aVal > bVal ? 1 : -1;
                        } else {
                            return aVal < bVal ? 1 : -1;
                        }
                    });
                    
                    // Update arrows in header
                    document.querySelectorAll('th[data-sort]').forEach(header => {
                        header.textContent = header.textContent.replace(' ↑', '').replace(' ↓', '');
                    });
                    th.textContent += sortDirection[column] ? ' ↑' : ' ↓';
                    
                    // Reorder rows
                    rows.forEach(row => tbody.appendChild(row));
                });
            });

            // Reset form with animation
            const resetBtn = document.getElementById('resetBtn');
            resetBtn.addEventListener('click', function(e) {
                e.preventDefault();
                
                const inputs = form.querySelectorAll('input');
                inputs.forEach(input => {
                    input.style.transition = 'all 0.3s ease';
                    input.style.transform = 'translateX(10px)';
                    input.style.opacity = '0';
                    
                    setTimeout(() => {
                        input.value = '';
                        input.style.transform = 'translateX(0)';
                        input.style.opacity = '1';
                    }, 300);
                });

                // Clear all error states
                document.querySelectorAll('.form-group').forEach(group => {
                    group.classList.remove('error');
                });
            });

            // Logo animation
            const logo = document.getElementById('logo');
            logo.addEventListener('click', function() {
                this.style.transform = 'rotate(360deg)';
                setTimeout(() => {
                    this.style.transform = 'none';
                }, 1000);
            });

            // Social icons hover effect
            document.querySelectorAll('.social-icons i').forEach(icon => {
                icon.addEventListener('mouseover', function() {
                    this.style.transform = 'translateY(-5px) rotate(15deg)';
                });
                
                icon.addEventListener('mouseout', function() {
                    this.style.transform = 'translateY(0) rotate(0)';
                });
            });

            // Dynamic status colors
            function updateStatuses() {
                const now = new Date();
                const statusElements = document.querySelectorAll('.status');
                
                statusElements.forEach(status => {
                    const row = status.closest('tr');
                    const dateCell = row.querySelector('td:nth-child(6)');
                    const reservationDate = new Date(dateCell.textContent);
                    
                    if (reservationDate < now) {
                        status.className = 'status expired';
                        status.textContent = 'Expired';
                    } else {
                        status.className = 'status valid';
                        status.textContent = 'Valid';
                    }
                });
            }

            // Update statuses every minute
            updateStatuses();
            setInterval(updateStatuses, 60000);

            // Responsive table handling
            function handleResponsiveTable() {
                const tableContainer = document.querySelector('.table-container');
                if (tableContainer.scrollWidth > tableContainer.clientWidth) {
                    tableContainer.style.boxShadow = '4px 0 10px rgba(0,0,0,0.2)';
                } else {
                    tableContainer.style.boxShadow = 'none';
                }
            }

            window.addEventListener('resize', handleResponsiveTable);
            handleResponsiveTable();

            // Form autosave
            const formInputs = form.querySelectorAll('input');
            formInputs.forEach(input => {
                input.addEventListener('input', () => {
                    localStorage.setItem(`reservation_${input.name}`, input.value);
                });
                
                // Restore saved values
                const savedValue = localStorage.getItem(`reservation_${input.name}`);
                if (savedValue) {
                    input.value = savedValue;
                }
            });

            // Clear localStorage on successful submission
            form.addEventListener('submit', () => {
                if (form.checkValidity()) {
                    formInputs.forEach(input => {
                        localStorage.removeItem(`reservation_${input.name}`);
                    });
                }
            });
        });
    </script>
</body>
</html>