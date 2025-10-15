<?php
// Ensure $logged_in_user is defined to avoid undefined variable error
if (!isset($logged_in_user)) {
    $logged_in_user = ['role' => 'user']; // default to normal user if not set
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-purple-50 via-violet-50 to-indigo-100 min-h-screen flex items-center justify-center font-sans text-gray-800 p-4">

  <!-- Background decorative elements -->
  <div class="fixed top-0 left-0 w-72 h-72 bg-purple-200 rounded-full -translate-x-1/2 -translate-y-1/2 opacity-40"></div>
  <div class="fixed bottom-0 right-0 w-96 h-96 bg-violet-200 rounded-full translate-x-1/3 translate-y-1/3 opacity-40"></div>
  <div class="fixed top-1/2 right-1/4 w-64 h-64 bg-indigo-200 rounded-full opacity-30"></div>

  <div class="bg-white/90 backdrop-blur-lg p-8 rounded-2xl shadow-2xl w-full max-w-md animate-fadeIn border border-purple-100 relative z-10">
    
    <!-- Header with icon -->
    <div class="text-center mb-8">
      <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-500 to-violet-600 rounded-full shadow-lg mb-4">
        <i class="fas fa-user-plus text-white text-2xl"></i>
      </div>
      <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-violet-600 bg-clip-text text-transparent">Create User</h1>
      <p class="text-gray-600 mt-2">Add a new user to the system</p>
    </div>

    <form id="user-form" action="<?=site_url('users/create/')?>" method="POST" class="space-y-6">

      <!-- Username -->
      <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <i class="fas fa-user text-purple-500"></i>
        </div>
        <input type="text" name="username" placeholder="Username" required
               value="<?= isset($username) ? html_escape($username) : '' ?>"
               class="w-full pl-10 pr-4 py-3 border-2 border-purple-100 bg-purple-50/50 rounded-xl focus:ring-2 focus:ring-purple-300 focus:border-purple-400 focus:outline-none text-gray-800 transition-all duration-300">
      </div>

      <!-- Email -->
      <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <i class="fas fa-envelope text-purple-500"></i>
        </div>
        <input type="email" name="email" placeholder="Email" required
               value="<?= isset($email) ? html_escape($email) : '' ?>"
               class="w-full pl-10 pr-4 py-3 border-2 border-purple-100 bg-purple-50/50 rounded-xl focus:ring-2 focus:ring-purple-300 focus:border-purple-400 focus:outline-none text-gray-800 transition-all duration-300">
      </div>

      <!-- Password with toggle -->
      <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <i class="fas fa-lock text-purple-500"></i>
        </div>
        <input type="password" name="password" id="password" placeholder="Password" required
               class="w-full pl-10 pr-12 py-3 border-2 border-purple-100 bg-purple-50/50 rounded-xl focus:ring-2 focus:ring-purple-300 focus:border-purple-400 focus:outline-none text-gray-800 transition-all duration-300">
        <i class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer text-purple-600 hover:text-purple-800 transition-colors duration-200" id="togglePassword"></i>
      </div>

      <!-- Role -->
      <?php if($logged_in_user['role'] === 'admin'): ?>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fas fa-user-tag text-purple-500"></i>
          </div>
          <select name="role" required
                  class="w-full pl-10 pr-4 py-3 border-2 border-purple-100 bg-purple-50/50 rounded-xl focus:ring-2 focus:ring-purple-300 focus:border-purple-400 focus:outline-none text-gray-800 appearance-none transition-all duration-300">
            <option value="" disabled selected>Select Role</option>
            <option value="user">User</option>
            <option value="admin">Admin</option>
          </select>
          <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
            <i class="fas fa-chevron-down text-purple-500"></i>
          </div>
        </div>
      <?php else: ?>
        <!-- Normal users can only create a user account -->
        <input type="hidden" name="role" value="user">
      <?php endif; ?>

      <!-- Submit -->
      <button type="submit"
              class="w-full bg-gradient-to-r from-purple-500 to-violet-600 hover:from-purple-600 hover:to-violet-700 text-white font-semibold py-3.5 rounded-xl shadow-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl active:translate-y-0">
        <i class="fas fa-user-plus mr-2"></i>Create User
      </button>
    </form>

    <div class="text-center mt-8 pt-6 border-t border-purple-100">
      <a href="<?=site_url('/users'); ?>" class="inline-flex items-center bg-gradient-to-r from-purple-100 to-violet-100 hover:from-purple-200 hover:to-violet-200 text-purple-700 font-medium py-2.5 px-6 rounded-xl shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
        <i class="fas fa-arrow-left mr-2"></i>Return to Home
      </a>
    </div>
  </div>

  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn {
      animation: fadeIn 0.8s ease;
    }
    
    /* Custom scrollbar for select */
    select::-ms-expand {
      display: none;
    }
    select {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
    }
    
    /* Enhanced focus states */
    input:focus, select:focus {
      box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
    }
  </style>

  <!-- Password Toggle -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const togglePassword = document.getElementById('togglePassword');
      const password = document.getElementById('password');

      if (togglePassword && password) {
        togglePassword.addEventListener('click', function () {
          const type = password.type === 'password' ? 'text' : 'password';
          password.type = type;
          this.classList.toggle('fa-eye');
          this.classList.toggle('fa-eye-slash');
        });
      }
    });
  </script>

</body>
</html>