<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body, html {
      width: 100%;
      height: 100%;
    }

    section {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 100vh;
      background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 50%, #6d28d9 100%);
      position: relative;
      overflow: hidden;
    }

    /* Decorative background elements */
    .bg-shape-1 {
      position: absolute;
      width: 400px;
      height: 400px;
      border-radius: 50%;
      background: rgba(192, 132, 252, 0.2);
      top: -150px;
      left: -150px;
      z-index: 0;
    }

    .bg-shape-2 {
      position: absolute;
      width: 300px;
      height: 300px;
      border-radius: 50%;
      background: rgba(167, 139, 250, 0.2);
      bottom: -100px;
      right: -100px;
      z-index: 0;
    }

    .bg-shape-3 {
      position: absolute;
      width: 200px;
      height: 200px;
      border-radius: 50%;
      background: rgba(196, 181, 253, 0.2);
      top: 30%;
      right: 20%;
      z-index: 0;
    }

    .login {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      padding: 50px 40px;
      width: 500px;
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(107, 33, 168, 0.3);
      border: 1px solid rgba(139, 92, 246, 0.2);
      display: flex;
      flex-direction: column;
      gap: 25px;
      position: relative;
      z-index: 1;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .login:hover {
      transform: translateY(-5px);
      box-shadow: 0 25px 50px rgba(107, 33, 168, 0.4);
    }

    .login h2 {
      text-align: center;
      font-size: 2.2em;
      font-weight: 700;
      background: linear-gradient(135deg, #8b5cf6, #7c3aed);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 10px;
      position: relative;
    }

    .login h2:after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 60px;
      height: 4px;
      background: linear-gradient(to right, #8b5cf6, #7c3aed);
      border-radius: 2px;
    }

    .inputBox {
      position: relative;
      margin-bottom: 15px;
    }

    .inputBox input {
      width: 100%;
      padding: 16px 50px 16px 20px;
      font-size: 1.1em;
      color: #7c3aed;
      border-radius: 12px;
      background: #faf5ff;
      border: 2px solid #e9d5ff;
      outline: none;
      transition: all 0.3s ease;
    }

    .inputBox input:focus {
      border-color: #8b5cf6;
      background: white;
      box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.2);
    }

    .inputBox ::placeholder {
      color: #a78bfa;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #8b5cf6;
      transition: color 0.3s ease;
    }

    .toggle-password:hover {
      color: #7c3aed;
    }

    button {
      width: 100%;
      padding: 16px;
      border: none;
      background: linear-gradient(135deg, #8b5cf6, #7c3aed);
      color: #fff;
      font-size: 1.15em;
      font-weight: 600;
      border-radius: 12px;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(139, 92, 246, 0.4);
      margin-top: 10px;
    }

    button:hover {
      background: linear-gradient(135deg, #7c3aed, #6d28d9);
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(139, 92, 246, 0.6);
    }

    button:active {
      transform: translateY(0);
    }

    .group {
      text-align: center;
      padding-top: 15px;
      border-top: 1px solid #e9d5ff;
    }

    .group p {
      color: #6b7280;
      margin-bottom: 5px;
    }

    .group a {
      font-size: 1em;
      color: #8b5cf6;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
      position: relative;
    }

    .group a:after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 2px;
      background: #8b5cf6;
      transition: width 0.3s ease;
    }

    .group a:hover {
      color: #7c3aed;
    }

    .group a:hover:after {
      width: 100%;
    }

    .error-box {
      background: rgba(219, 39, 119, 0.1);
      color: #7c3aed;
      padding: 12px;
      border: 1px solid rgba(139, 92, 246, 0.3);
      border-radius: 10px;
      text-align: center;
      font-size: 0.95em;
      margin-bottom: 10px;
      box-shadow: 0 2px 8px rgba(139, 92, 246, 0.1);
    }

    .icon-container {
      display: flex;
      justify-content: center;
      margin-bottom: 10px;
    }

    .icon-circle {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      background: linear-gradient(135deg, #8b5cf6, #7c3aed);
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 8px 20px rgba(139, 92, 246, 0.4);
    }

    .icon-circle i {
      font-size: 28px;
      color: white;
    }

    .input-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #8b5cf6;
      font-size: 1.1em;
    }
  </style>
</head>
<body>
  <div class="bg-shape-1"></div>
  <div class="bg-shape-2"></div>
  <div class="bg-shape-3"></div>
  
  <section>
    <div class="login">
      <div class="icon-container">
        <div class="icon-circle">
          <i class="fas fa-user-lock"></i>
        </div>
      </div>
      <h2>Welcome Back</h2>

      <?php if (!empty($error)): ?>
        <div class="error-box">
          <?= $error ?>
        </div>
      <?php endif; ?>

      <form method="post" action="<?= site_url('reg/login') ?>">
        <div class="inputBox">
          <i class="fas fa-user input-icon"></i>
          <input type="text" placeholder="Username" name="username" required>
        </div>

        <div class="inputBox">
          <i class="fas fa-lock input-icon"></i>
          <input type="password" placeholder="Password" name="password" id="password" required>
          <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
        </div>

        <button type="submit" id="btn">Login</button>
      </form>

      <div class="group">
        <p>Don't have an account?</p>
        <a href="<?= site_url('reg/register'); ?>">Register here</a>
      </div>
    </div>
  </section>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);

      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>