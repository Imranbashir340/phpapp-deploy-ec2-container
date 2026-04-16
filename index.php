<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docker PHP Deployment</title>
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --bg-color: #f3f4f6;
            --card-bg: #ffffff;
            --text-color: #1f2937;
            --success-color: #10b981;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 800px;
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            overflow: hidden;
            padding: 40px;
            text-align: center;
        }

        h1 {
            color: var(--text-color);
            margin-bottom: 10px;
            font-size: 2.5rem;
        }

        p.subtitle {
            color: #6b7280;
            margin-bottom: 30px;
            font-size: 1.1rem;
        }

        .status-badge {
            display: inline-block;
            background-color: #d1fae5;
            color: #065f46;
            padding: 8px 16px;
            border-radius: 50px;
            font-weight: bold;
            margin-bottom: 30px;
            border: 1px solid #a7f3d0;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .info-card {
            background: #f9fafb;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }

        .info-card h3 {
            margin: 0 0 10px 0;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #6b7280;
        }

        .info-card p {
            margin: 0;
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        .btn {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 24px;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s;
            font-weight: 500;
        }

        .btn:hover {
            background-color: var(--secondary-color);
        }

        footer {
            margin-top: 40px;
            font-size: 0.85rem;
            color: #9ca3af;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header Section -->
        <div class="status-badge">● System Online</div>
        <h1>Deployment Successful</h1>
        <p class="subtitle">Your PHP application is running inside a Docker container on EC2.</p>

        <!-- System Info Section -->
        <div class="info-grid">
            <div class="info-card">
                <h3>PHP Version</h3>
                <p><?php echo phpversion(); ?></p>
            </div>
            <div class="info-card">
                <h3>Server IP</h3>
                <p><?php echo $_SERVER['SERVER_ADDR']; ?></p>
            </div>
            <div class="info-card">
                <h3>Server Time</h3>
                <p><?php echo date("H:i:s"); ?></p>
            </div>
        </div>

        <!-- Action Button -->
        <a href="?phpinfo=1" class="btn">View Full PHP Info</a>

        <footer>
            Powered by Docker & Apache Web Server
        </footer>
    </div>

    <!-- Show full PHP Info only if requested -->
    <?php if (isset($_GET['phpinfo'])) { ?>
        <div style="text-align: left; margin-top: 40px; padding: 20px; background: #fff;">
            <?php phpinfo(); ?>
        </div>
    <?php } ?>

</body>
</html>