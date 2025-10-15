<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body, section {
      width: 100%;
      height: 100vh;
      background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 50%, #6d28d9 100%);
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      overflow: hidden;
    }

    /* Decorative elements */
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
      top: 50%;
      right: 30%;
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
      margin-bottom: 30px;
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
    }

    .login input {
      width: 100%;
      padding: 16px 20px;
      margin-bottom: 20px;
      font-size: 1.05em;
      border-radius: 12px;
      border: 2px solid #e9d5ff;
      background: #faf5ff;
      color: #7c3aed;
      outline: none;
      transition: all 0.3s ease;
    }

    .login input:focus {
      border-color: #8b5cf6;
      background: white;
      box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.2);
    }

    .login input::placeholder {
      color: #a78bfa;
    }

    .password-box {
      position: relative;
    }

    .password-box i {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #8b5cf6;
      transition: color 0.3s ease;
    }

    .password-box i:hover {
      color: #7c3aed;
    }

    #btn {
      width: 100%;
      padding: 16px;
      font-size: 1.2em;
      font-weight: 600;
      border: none;
      border-radius: 12px;
      background: linear-gradient(135deg, #8b5cf6, #7c3aed);
      color: white;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(139, 92, 246, 0.4);
      margin-top: 10px;
    }

    #btn:hover {
      background: linear-gradient(135deg, #7c3aed, #6d28d9);
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(139, 92, 246, 0.6);
    }

    #btn:active {
      transform: translateY(0);
    }

    .group {
      text-align: center;
      margin-top: 20px;
      padding-top: 20px;
      border-top: 1px solid #e9d5ff;
    }

    .group p {
      color: #6b7280;
      margin-bottom: 5px;
    }

    .group a {
      color: #8b5cf6;
      text-decoration: none;
      font-weight: 600;
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

    .icon-container {
      display: flex;
      justify-content: center;
      margin-bottom: 25px;
    }

    .icon-circle {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background: linear-gradient(135deg, #8b5cf6, #7c3aed);
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 8px 20px rgba(139, 92, 246, 0.4);
    }

    .icon-circle i {
      font-size: 32px;
      color: white;
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
          <i class="fas fa-user-plus"></i>
        </div>
      </div>
      <h2>Create Account</h2>
      <form method="POST" action="<?= site_url('reg/register'); ?>" class="inputBox">

        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>

        <div class="password-box">
          <input type="password" id="password" name="password" placeholder="Password" required>
          <i class="fa-solid fa-eye" id="togglePassword"></i>
        </div>

        <div class="password-box">
          <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
          <i class="fa-solid fa-eye" id="toggleConfirmPassword"></i>
        </div>

        <!-- Hidden role input to force user role -->
        <input type="hidden" name="role" value="user">

        <button type="submit" id="btn">Register Now</button>
      </form>

      <div class="group">
        <p>Already have an account?</p>
        <a href="<?= site_url('reg/login'); ?>">Login here</a>
      </div>
    </div>
  </section>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener('click', function () {
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');
  </script>
</body>
</html>