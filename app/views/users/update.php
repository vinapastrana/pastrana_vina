<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User</title>
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
        <i class="fas fa-user-edit text-white text-2xl"></i>
      </div>
      <h2 class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-violet-600 bg-clip-text text-transparent">Update User</h2>
      <p class="text-gray-600 mt-2">Edit user information</p>
    </div>

    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST" class="space-y-6">
      
      <!-- Username -->
      <div class="relative">
        <label class="block text-purple-700 font-medium mb-2">
          <i class="fas fa-user mr-2"></i>Username
        </label>
        <input type="text" name="username" value="<?= html_escape($user['username'])?>" required
               class="w-full pl-4 pr-4 py-3 border-2 border-purple-100 bg-purple-50/50 rounded-xl focus:ring-2 focus:ring-purple-300 focus:border-purple-400 focus:outline-none text-gray-800 transition-all duration-300">
      </div>

      <!-- Email -->
      <div class="relative">
        <label class="block text-purple-700 font-medium mb-2">
          <i class="fas fa-envelope mr-2"></i>Email Address
        </label>
        <input type="email" name="email" value="<?= html_escape($user['email'])?>" required
               class="w-full pl-4 pr-4 py-3 border-2 border-purple-100 bg-purple-50/50 rounded-xl focus:ring-2 focus:ring-purple-300 focus:border-purple-400 focus:outline-none text-gray-800 transition-all duration-300">
      </div>

      <?php if(!empty($logged_in_user) && $logged_in_user['role'] === 'admin'): ?>
        <!-- Role Dropdown for Admins -->
        <div class="relative">
          <label class="block text-purple-700 font-medium mb-2">
            <i class="fas fa-user-tag mr-2"></i>Role
          </label>
          <select name="role" required
                  class="w-full pl-4 pr-10 py-3 border-2 border-purple-100 bg-purple-50/50 rounded-xl focus:ring-2 focus:ring-purple-300 focus:border-purple-400 focus:outline-none text-gray-800 appearance-none transition-all duration-300">
            <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
          </select>
          <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none top-6">
            <i class="fas fa-chevron-down text-purple-500"></i>
          </div>
        </div>

        <!-- Password Field for Admins -->
        <div class="relative">
          <label class="block text-purple-700 font-medium mb-2">
            <i class="fas fa-lock mr-2"></i>Password
          </label>
          <input type="password" name="password" id="password"
                 placeholder="Leave blank to keep current password"
                 class="w-full pl-4 pr-12 py-3 border-2 border-purple-100 bg-purple-50/50 rounded-xl focus:ring-2 focus:ring-purple-300 focus:border-purple-400 focus:outline-none text-gray-800 transition-all duration-300">
          <i class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer text-purple-600 hover:text-purple-800 transition-colors duration-200 mt-2" id="togglePassword"></i>
        </div>
        <p class="text-sm text-purple-600 mt-1"><i class="fas fa-info-circle mr-1"></i>Leave password field empty to maintain current password</p>
      <?php endif; ?>

      <!-- Submit Button -->
      <button type="submit"
              class="w-full bg-gradient-to-r from-purple-500 to-violet-600 hover:from-purple-600 hover:to-violet-700 text-white font-semibold py-3.5 rounded-xl shadow-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl active:translate-y-0 mt-4">
        <i class="fas fa-save mr-2"></i>Update User
      </button>
    </form>

    <!-- Return Button -->
    <div class="text-center mt-6 pt-6 border-t border-purple-100">
      <a href="<?=site_url('/users');?>" class="inline-flex items-center bg-gradient-to-r from-purple-100 to-violet-100 hover:from-purple-200 hover:to-violet-200 text-purple-700 font-medium py-2.5 px-6 rounded-xl shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
        <i class="fas fa-arrow-left mr-2"></i>Return to Home
      </a>
    </div>
  </div>

  <!-- Password Toggle Script -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const togglePassword = document.getElementById('togglePassword');
      const password = document.getElementById('password');

      if (togglePassword && password) {
        togglePassword.addEventListener('click', function() {
          const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
          password.setAttribute('type', type);

          this.classList.toggle('fa-eye');
          this.classList.toggle('fa-eye-slash');
        });
      }
    });
  </script>

  <!-- Fade-in animation -->
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
</body>
</html>