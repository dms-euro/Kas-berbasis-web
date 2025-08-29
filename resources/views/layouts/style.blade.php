<style>
     :root {
            --primary-color: #4361ee;
            --secondary-color: #7b4dff;
            --accent-color: #6c63ff;
            --light-bg: #f8f9fa;
            --text-dark: #212529;
            --text-light: #6c757d;
        }

        body {
            background-color: #d8e4fb;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Header Styles */
        .app-header {
            background: linear-gradient(120deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1rem 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        /* Card Styles */
        .dashboard-card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 7px 14px rgba(0, 0, 0, 0.1);
            background: white;
        }

        /* Table Styles */
        .finance-table {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .finance-table thead th {
            background: linear-gradient(120deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 1rem;
            font-weight: 600;
        }

        .finance-table tbody td {
            padding: 1rem;
            vertical-align: middle;
        }

        .finance-table tbody tr:nth-child(even) {
            background-color: rgba(108, 99, 255, 0.03);
        }

        /* Status Badges */
        .badge-paid {
            background-color: rgba(40, 167, 69, 0.2);
            color: #28a745;
            padding: 0.5rem 0.8rem;
            border-radius: 20px;
            font-weight: 500;
        }

        .badge-pending {
            background-color: rgba(255, 193, 7, 0.2);
            color: #ffc107;
            padding: 0.5rem 0.8rem;
            border-radius: 20px;
            font-weight: 500;
        }

        /* Checkbox Style */
        .form-check-input {
            width: 1.2em;
            height: 1.2em;
            cursor: default;
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Action Buttons */
        .btn-action {
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            font-size: 0.875rem;
        }

        /* Filter Section */
        .filter-section {
            background-color: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
        }

        /* Summary Cards */
        .summary-card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }

        .summary-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        /* Payment Status Icons */
        .payment-status {
            display: inline-block;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            text-align: center;
            line-height: 24px;
            font-size: 14px;
        }

        .status-paid {
            background-color: #28a745;
            color: white;
        }

        .status-pending {
            background-color: #ffc107;
            color: white;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .main-content {
                padding: 1rem;
            }

            .finance-table {
                font-size: 0.875rem;
            }

            .finance-table thead th,
            .finance-table tbody td {
                padding: 0.75rem 0.5rem;
            }

            .d-md-flex {
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }
        }

        /* Futuristic Elements */
        .glow-effect {
            box-shadow: 0 0 15px rgba(108, 99, 255, 0.3);
        }

        .gradient-bg {
            background: linear-gradient(120deg, var(--primary-color), var(--secondary-color));
        }
    </style>
