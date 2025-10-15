<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Directory</title>
  <link rel="stylesheet" href="<?=base_url();?>/public/style.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    .pagination {
      display: flex;
      gap: 0.5rem;
      flex-wrap: wrap;
      justify-content: center;
      margin-top: 1.5rem;
    }
    .pagination a {
      display: inline-block;
      padding: 0.5rem 1rem;
      background-color: #8b5cf6;
      color: white;
      border-radius: 0.5rem;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    .pagination a:hover {
      background-color: #7c3aed;
      transform: translateY(-2px);
    }
    .pagination strong {
      display: inline-block;
      padding: 0.5rem 1rem;
      background-color: #6d28d9;
      color: white;
      border-radius: 0.5rem;
      font-weight: 600;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    /* Custom purple gradient */
    .purple-gradient {
      background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 50%, #c4b5fd 100%);
    }
    
    .glass-effect {
      background: rgba(255, 255, 255, 0.7);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .table-row-hover:hover {
      background-color: rgba(139, 92, 246, 0.1);
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(139, 92, 246, 0.15);
    }
    
    .btn-primary {
      background: linear-gradient(135deg, #8b5cf6, #7c3aed);
      color: white;
      transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
      background: linear-gradient(135deg, #7c3aed, #6d28d9);
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(139, 92, 246, 0.4);
    }
    
    .btn-secondary {
      background: linear-gradient(135deg, #c4b5fd, #a78bfa);
      color: white;
      transition: all 0.3s ease;
    }
    
    .btn-secondary:hover {
      background: linear-gradient(135deg, #a78bfa, #8b5cf6);
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(167, 139, 250, 0.4);
    }
    
    .text-gradient {
      background: linear-gradient(135deg, #8b5cf6, #7c3aed);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
  </style>
</head>

<body class="bg-gradient-to-br from-purple-50 via-violet-50 to-indigo-50 min-h-screen font-sans text-gray-800">

  <!-- Navbar -->
  <nav class="purple-gradient shadow-lg">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <div class="flex items-center space-x-2">
        <div class="bg-white p-2 rounded-full">
          <i class="fas fa-users text-purple-600"></i>
        </div>
        <a href="#" class="text-white font-bold text-xl tracking-wide">User Management</a>
      </div>
      <!-- Logout button in navbar -->
      <a href="<?=site_url('reg/logout');?>" 
         class="glass-effect text-purple-700 font-semibold px-4 py-2 rounded-lg shadow hover:bg-white transition-all duration-300 flex items-center space-x-2">
         <i class="fas fa-sign-out-alt"></i>
         <span>Logout</span>
      </a>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="max-w-6xl mx-auto mt-10 px-4">

    <div class="glass-effect shadow-2xl rounded-2xl p-8">

      <!-- Logged In User Display -->
      <?php if(!empty($logged_in_user)): ?>
        <div class="mb-8 bg-gradient-to-r from-purple-100 to-violet-100 text-purple-800 px-6 py-5 rounded-xl shadow-lg text-center border border-purple-200">
          <h2 class="text-3xl font-bold mb-1">
            Welcome, <span class="font-semibold text-gradient"><?= html_escape($logged_in_user['username']); ?></span>!
          </h2>
          <p class="text-xl">Role: <span class="font-semibold text-purple-600"><?= html_escape($logged_in_user['role']); ?></span></p>
        </div>
      <?php else: ?>
        <div class="mb-6 bg-red-100 text-red-700 px-4 py-3 rounded-lg shadow text-center">
          Logged in user not found
        </div>
      <?php endif; ?>

      <!-- Header -->
      <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0">
        <div class="flex items-center space-x-3">
          <div class="bg-purple-100 p-3 rounded-full">
            <i class="fas fa-user-friends text-purple-600 text-xl"></i>
          </div>
          <h1 class="text-2xl font-bold text-gradient">User Directory</h1>
        </div>

        <!-- Search Bar -->
        <form method="get" action="<?=site_url('users');?>" class="flex w-full md:w-auto">
          <div class="relative w-full">
            <input 
              type="text" 
              name="q" 
              value="<?=html_escape($_GET['q'] ?? '')?>" 
              placeholder="Search user..." 
              class="w-full border border-purple-200 bg-purple-50 rounded-l-xl px-4 py-3 pl-10 focus:outline-none focus:ring-2 focus:ring-purple-300 text-gray-800">
            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-purple-400"></i>
          </div>
          <button type="submit" class="btn-primary px-5 rounded-r-xl">
            Search
          </button>
        </form>
      </div>
      
      <!-- Table -->
      <div class="overflow-x-auto rounded-xl border border-purple-200 shadow-md">
        <table class="w-full text-center border-collapse">
          <thead>
            <tr class="purple-gradient text-white">
              <th class="py-4 px-4 font-semibold"><i class="fas fa-id-badge mr-2"></i>ID</th>
              <th class="py-4 px-4 font-semibold"><i class="fas fa-user mr-2"></i>Username</th>
              <th class="py-4 px-4 font-semibold"><i class="fas fa-envelope mr-2"></i>Email</th>
              <th class="py-4 px-4 font-semibold"><i class="fas fa-user-tag mr-2"></i>Role</th>
              <th class="py-4 px-4 font-semibold"><i class="fas fa-cogs mr-2"></i>Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-purple-100">
            <?php foreach(html_escape($users) as $user): ?>
              <tr class="table-row-hover transition-all duration-300">
                <td class="py-4 px-4 font-medium"><?=($user['id']);?></td>
                <td class="py-4 px-4"><?=($user['username']);?></td>
                <td class="py-4 px-4">
                  <span class="bg-purple-100 text-purple-700 text-sm font-medium px-3 py-2 rounded-full inline-flex items-center">
                    <i class="fas fa-envelope mr-2"></i>
                    <?=($user['email']);?>
                  </span>
                </td>
                <td class="py-4 px-4 font-medium">
                  <span class="px-3 py-1 rounded-full <?= $user['role'] === 'admin' ? 'bg-purple-200 text-purple-800' : 'bg-indigo-100 text-indigo-800' ?>">
                    <?=($user['role']);?>
                  </span>
                </td>
                <td class="py-4 px-4 space-x-2">
                  <?php if($logged_in_user['role'] === 'admin' || $logged_in_user['id'] == $user['id']): ?>
                    <a href="<?=site_url('users/update/'.$user['id']);?>"
                       class="btn-secondary px-4 py-2 text-sm font-medium rounded-lg inline-flex items-center">
                      <i class="fas fa-edit mr-2"></i> Update
                    </a>
                  <?php endif; ?>

                  <?php if($logged_in_user['role'] === 'admin'): ?>
                    <a href="<?=site_url('users/delete/'.$user['id']);?>"
                       onclick="return confirm('Are you sure you want to delete this record?');"
                       class="btn-primary px-4 py-2 text-sm font-medium rounded-lg inline-flex items-center">
                      <i class="fas fa-trash-alt mr-2"></i> Delete
                    </a>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="mt-8 flex justify-center">
        <div class="pagination">
          <?= $page; ?>
        </div>
      </div>

      <!-- Create New User -->
      <div class="mt-8 text-center">
        <a href="<?=site_url('users/create')?>"
           class="btn-primary font-semibold px-8 py-3 rounded-lg shadow-md inline-flex items-center">
          <i class="fas fa-user-plus mr-2"></i> Create New User
        </a>
      </div>
    </div>
  </div>

</body>
</html>