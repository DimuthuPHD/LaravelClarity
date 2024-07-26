<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to {{config('app.name')}}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1, h2, h3 {
            color: #333;
        }

        p {
            color: #666;
        }

        a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <h1>Welcome to {{config('app.name')}}</h1>

    <h2>Empowering Your Applications with Seamless Integration</h2>

    <h3>What is {{config('app.name')}}?</h3>

    <p>{{config('app.name')}} is a powerful and versatile API designed to simplify and enhance your development experience. Whether
        you're building web applications, mobile apps, or integrating with third-party services, {{config('app.name')}} provides
        the tools and resources you need to accelerate your project.</p>

    <h3>Key Features</h3>

    <ul>
        <li><strong>Scalable Infrastructure:</strong> Our API is built on a robust and scalable infrastructure, ensuring
            that it can handle the demands of your growing user base.</li>

        <li><strong>Developer-Friendly Documentation:</strong> Explore our comprehensive documentation that guides you
            through every endpoint, parameter, and authentication method. We're committed to making integration a breeze.
        </li>

        <li><strong>Secure and Reliable:</strong> Security is our top priority. {{config('app.name')}} employs the latest
            encryption and authentication protocols to ensure that your data is always secure.</li>

        <li><strong>Real-time Analytics:</strong> Gain insights into your API usage with real-time analytics. Track
            performance, monitor trends, and optimize your application accordingly.</li>
    </ul>

    <h3>Getting Started</h3>

    <ol>
        <li><strong>Sign Up:</strong> Create an account to get your API key and start exploring the features.</li>

        <li><strong>Documentation:</strong> Dive into our <a href="/api/documentation">API Documentation</a> to understand how
            to make requests, handle responses, and troubleshoot common issues.</li>

        <li><strong>Code Samples:</strong> Jumpstart your integration with our comprehensive code samples in various
            programming languages.</li>

    </ol>
</body>

</html>
