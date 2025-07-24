<html lang="en">
  <!DOCTYPE html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup | Car Clinic By GR</title>
      <link href="/img/logo.png" rel="icon">
    <style>
      /* reset & base */
      * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
      }
      body {
        background: url("images/bg-1.jpg") no-repeat center center/cover;
        font-family: "Poppins", sans-serif;
        /* background: #f5f5f5; */
        min-height: 100vh;
        display: flex;
        justify-content: flex-end; /* align form to right */
        align-items: center;
        padding-right: 5%; /* keep a gap from right edge */
      }

      .form-container {
        background: #fff;
        padding: 2.5rem;
        border-radius: 8px;
        width: 400px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        animation: slideIn 0.8s ease-out;
        /* increase height via padding and min-height */
        min-height: 550px;
        display: flex;
        flex-direction: column;
        justify-content: center;
      }

      @keyframes slideIn {
        from {
          opacity: 0;
          transform: translateY(30px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .form-container h2 {
        text-align: center;
        margin-bottom: 1.5rem;
        color: #e30613;
      }
      .form-container input {
        width: 100%;
        padding: 0.75rem;
        margin-bottom: 1rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1rem;
        animation: fadeInField 0.6s ease forwards;
        opacity: 0;
      }
      /* staggered fade-in */
      .form-container input:nth-of-type(1) {
        animation-delay: 0.2s;
      }
      .form-container input:nth-of-type(2) {
        animation-delay: 0.4s;
      }
      .form-container input:nth-of-type(3) {
        animation-delay: 0.6s;
      }

      @keyframes fadeInField {
        to {
          opacity: 1;
        }
      }

      .form-container button {
        width: 100%;
        padding: 0.75rem;
        background: #e30613;
        border: none;
        color: #fff;
        font-size: 1rem;
        border-radius: 4px;
        cursor: pointer;
        transition: background 0.3s;
        margin-top: 1rem;
      }
      .form-container button:hover {
        background: #b30510;
      }

      .form-container .toggle-link {
        text-align: center;
        margin-top: 1.5rem;
        font-size: 0.9rem;
      }
      .form-container .toggle-link a {
        color: #e30613;
        font-weight: bold;
      }
      .form-container .toggle-link a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <div class="form-container">
      <h2>Signup</h2>
      <form action="/register" method="POST">
        @csrf
        <input type="text" name="fullname" placeholder="Full Name" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="text" name="phone" placeholder="Phone Number" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit">Create Account</button>
    </form>

      <div class="toggle-link">
        Already have an account? <a href="login.html">Login</a>
      </div>
      @if ($errors->any())
    <div class="text-red-500">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif
    </div>
  </body>
</html>
