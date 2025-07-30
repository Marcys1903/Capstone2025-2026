<?php
// --- PHP PLACEHOLDER LOGIC ---
// This section simulates backend data for user registrations.
// In a real application, this data would be fetched from a database.
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample user registration data
$userRegistrations = [
    [
        'id' => 'USR-001',
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'role' => 'Resident',
        'status' => 'Active',
        'registration_date' => '2025-07-01',
        'last_login' => '2025-07-28 09:00 AM',
        'description' => 'Registered resident in Barangay 1.'
    ],
    [
        'id' => 'USR-002',
        'name' => 'Jane Smith',
        'email' => 'jane.smith@example.com',
        'role' => 'Emergency Responder',
        'status' => 'Active',
        'registration_date' => '2025-06-15',
        'last_login' => '2025-07-28 10:15 AM',
        'description' => 'Volunteer emergency responder, certified in first aid.'
    ],
    [
        'id' => 'USR-003',
        'name' => 'Admin User',
        'email' => 'admin.user@example.com',
        'role' => 'Admin',
        'status' => 'Active',
        'registration_date' => '2025-05-20',
        'last_login' => '2025-07-28 08:30 AM',
        'description' => 'System administrator with full privileges.'
    ],
    [
        'id' => 'USR-004',
        'name' => 'Pending User',
        'email' => 'pending.user@example.com',
        'role' => 'Resident',
        'status' => 'Pending',
        'registration_date' => '2025-07-27',
        'last_login' => 'N/A',
        'description' => 'New user awaiting activation.'
    ],
    [
        'id' => 'USR-005',
        'name' => 'Inactive User',
        'email' => 'inactive.user@example.com',
        'role' => 'Resident',
        'status' => 'Inactive',
        'registration_date' => '2025-04-10',
        'last_login' => '2025-06-01 11:00 AM',
        'description' => 'Account deactivated due to inactivity.'
    ]
];

// Sample options for dropdowns
$userRoles = ['All', 'Resident', 'Admin', 'Emergency Responder', 'Guest'];
$userStatuses = ['All', 'Active', 'Pending', 'Inactive', 'Blocked'];
?>

<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">User Registration Module</h1>
        <?php
        $hasProfilePic = !empty($userProfilePic);
        if ($isLoggedIn) : ?>
            <div class="flex items-center space-x-3">
                <?php if ($hasProfilePic) : ?>
                    <img src="<?php echo htmlspecialchars($userProfilePic); ?>"
                         alt="<?php echo htmlspecialchars($userName); ?>'s Profile Picture"
                         class="w-10 h-10 rounded-full object-cover border-2 border-blue-400">
                <?php else : ?>
                    <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center border-2 border-gray-400">
                        <svg class="w-6 h-6 text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                <?php endif; ?>
                <span class="text-lg font-medium hidden md:block"><?php echo htmlspecialchars($userName); ?></span>
            </div>
        <?php endif; ?>
    </header>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Manage System Users and Access</h2>
        <p class="text-gray-700 leading-relaxed">
            The User Registration Module allows administrators to manage all registered users within the emergency communication system. This includes creating new user accounts, updating existing profiles, assigning roles, managing account statuses, and maintaining a comprehensive record of all system users.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Registered Users</h2>

        <div class="mb-6 flex justify-between items-center">
            <!-- Filter Controls -->
            <div class="flex space-x-4">
                <div>
                    <label for="filterStatus" class="block text-sm font-medium text-gray-700">Filter by Status:</label>
                    <select id="filterStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($userStatuses as $status) : ?>
                            <option value="<?php echo htmlspecialchars($status); ?>"><?php echo htmlspecialchars($status); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="filterRole" class="block text-sm font-medium text-gray-700">Filter by Role:</label>
                    <select id="filterRole" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($userRoles as $role) : ?>
                            <option value="<?php echo htmlspecialchars($role); ?>"><?php echo htmlspecialchars($role); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button onclick="openConfigModal('new')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Add New User
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Registration Date</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="userTableBody">
                    <!-- Users will be rendered here by JavaScript -->
                    <?php if (empty($userRegistrations)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No users registered.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Custom Modals -->
    <!-- User Configuration Modal (Add/Edit) -->
    <div id="configModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4" id="configModalTitle">Add New User</h3>
            <form id="configForm" onsubmit="return saveUser(event)">
                <input type="hidden" id="userId">
                <div class="mb-4">
                    <label for="userName" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="userName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="userEmail" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" id="userEmail" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="userPassword" class="block text-sm font-medium text-gray-700">Password (Leave blank to keep current)</label>
                    <input type="password" id="userPassword" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <p class="mt-1 text-xs text-gray-500">Only fill this if you want to change the password.</p>
                </div>
                <div class="mb-4">
                    <label for="userRole" class="block text-sm font-medium text-gray-700">Role</label>
                    <select id="userRole" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <?php foreach (array_slice($userRoles, 1) as $role) : // Exclude 'All' ?>
                            <option value="<?php echo htmlspecialchars($role); ?>"><?php echo htmlspecialchars($role); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="userStatus" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="userStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="Active">Active</option>
                        <option value="Pending">Pending</option>
                        <option value="Inactive">Inactive</option>
                        <option value="Blocked">Blocked</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="userDescription" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                    <textarea id="userDescription" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Brief description of the user"></textarea>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeConfigModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Save User
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- User Details Modal -->
    <div id="detailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">User Details</h3>
            <div class="space-y-3 text-gray-700">
                <p><strong>ID:</strong> <span id="modalUserId"></span></p>
                <p><strong>Name:</strong> <span id="modalUserName"></span></p>
                <p><strong>Email:</strong> <span id="modalUserEmail"></span></p>
                <p><strong>Role:</strong> <span id="modalUserRole"></span></p>
                <p><strong>Status:</strong> <span id="modalUserStatus"></span></p>
                <p><strong>Registration Date:</strong> <span id="modalRegistrationDate"></span></p>
                <p><strong>Last Login:</strong> <span id="modalLastLogin"></span></p>
                <p><strong>Description:</strong></p>
                <div id="modalUserDescription" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
            </div>
            <div class="mt-6 text-right">
                <button id="closeDetailsModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal (re-used) -->
    <div id="confirmationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white text-center">
            <h3 class="text-lg font-bold mb-4" id="confirmationModalTitle">Confirm Action</h3>
            <p class="text-gray-700 mb-6" id="confirmationModalMessage"></p>
            <div class="flex justify-center space-x-4">
                <button id="confirmCancelBtn" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Cancel
                </button>
                <button id="confirmProceedBtn" class="px-4 py-2 text-sm font-medium text-blue-600 rounded-md hover:bg-blue-700">
                    Proceed
                </button>
            </div>
        </div>
    </div>

    <!-- Alert Message Modal (re-used) -->
    <div id="alertModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white text-center">
            <h3 class="text-lg font-bold mb-4" id="alertModalTitle">Notification</h3>
            <p class="text-gray-700 mb-6" id="alertModalMessage"></p>
            <div class="flex justify-center">
                <button id="alertCloseBtn" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                    OK
                </button>
            </div>
        </div>
    </div>

</div>

<script>
    // Initial user registrations data from PHP
    let userRegistrationsData = <?php echo json_encode($userRegistrations); ?>;

    // Get references to DOM elements
    const userTableBody = document.getElementById('userTableBody');
    const filterStatusSelect = document.getElementById('filterStatus');
    const filterRoleSelect = document.getElementById('filterRole');

    // Custom Alert Modal elements (re-used from other modules)
    const alertModal = document.getElementById('alertModal');
    const alertModalTitle = document.getElementById('alertModalTitle');
    const alertModalMessage = document.getElementById('alertModalMessage');
    const alertCloseBtn = document.getElementById('alertCloseBtn');

    // Custom Confirmation Modal elements (re-used from other modules)
    const confirmationModal = document.getElementById('confirmationModal');
    const confirmationModalTitle = document.getElementById('confirmationModalTitle');
    const confirmationModalMessage = document.getElementById('confirmationModalMessage');
    const confirmCancelBtn = document.getElementById('confirmCancelBtn');
    const confirmProceedBtn = document.getElementById('confirmProceedBtn');
    let confirmCallback = null; // Stores the callback function for confirmation

    /**
     * Shows a custom alert modal.
     * @param {string} message - The message to display.
     * @param {string} [title='Notification'] - The title of the modal.
     */
    function showAlert(message, title = 'Notification') {
        alertModalTitle.textContent = title;
        alertModalMessage.textContent = message;
        alertModal.classList.remove('hidden');
    }

    /**
     * Shows a custom confirmation modal.
     * @param {string} message - The message to display.
     * @param {Function} callback - The function to call if confirmed (true for proceed, false for cancel).
     * @param {string} [title='Confirm Action'] - The title of the modal.
     */
    function showConfirm(message, callback, title = 'Confirm Action') {
        confirmationModalTitle.textContent = title;
        confirmationModalMessage.textContent = message;
        confirmCallback = callback; // Store the callback
        confirmationModal.classList.remove('hidden');
    }

    // Event listeners for custom modals
    alertCloseBtn.addEventListener('click', () => {
        alertModal.classList.add('hidden');
    });

    confirmCancelBtn.addEventListener('click', () => {
        confirmationModal.classList.add('hidden');
        if (confirmCallback) {
            confirmCallback(false); // Call callback with false for cancel
            confirmCallback = null; // Clear callback
        }
    });

    confirmProceedBtn.addEventListener('click', () => {
        confirmationModal.classList.add('hidden');
        if (confirmCallback) {
            confirmCallback(true); // Call callback with true for proceed
            confirmCallback = null; // Clear callback
        }
    });

    /**
     * Renders the user registration table based on the provided data.
     * @param {Array} dataToRender - The array of user objects to display.
     */
    function renderUserTable(dataToRender) {
        userTableBody.innerHTML = ''; // Clear existing rows

        if (dataToRender.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `<td colspan="7" class="px-6 py-4 text-center text-gray-500">No users registered matching filters.</td>`;
            userTableBody.appendChild(noDataRow);
            return;
        }

        dataToRender.forEach(user => {
            const row = document.createElement('tr');
            row.classList.add('hover:bg-gray-50');

            // Determine status badge color
            let statusClass = '';
            if (user.status === 'Active') statusClass = 'bg-green-100 text-green-800';
            else if (user.status === 'Pending') statusClass = 'bg-yellow-100 text-yellow-800';
            else if (user.status === 'Inactive' || user.status === 'Blocked') statusClass = 'bg-red-100 text-red-800';
            else statusClass = 'bg-gray-100 text-gray-800'; // Default

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${user.id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${user.name}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${user.email}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${user.role}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                        ${user.status}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${user.registration_date || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="viewDetails('${encodeURIComponent(JSON.stringify(user))}')" class="text-indigo-600 hover:text-indigo-900 mr-4">View</button>
                    <button onclick="openConfigModal('edit', '${encodeURIComponent(JSON.stringify(user))}')" class="text-blue-600 hover:text-blue-900 mr-4">Edit</button>
                    <button onclick="toggleUserStatus('${user.id}', '${user.status}')" class="text-yellow-600 hover:text-yellow-900 mr-4">Toggle Status</button>
                    <button onclick="deleteUser('${user.id}')" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
            `;
            userTableBody.appendChild(row);
        });
    }

    /**
     * Filters the user registration data based on selected criteria and re-renders the table.
     */
    function filterUsers() {
        const selectedStatus = filterStatusSelect.value;
        const selectedRole = filterRoleSelect.value;

        const filteredData = userRegistrationsData.filter(user => {
            const matchesStatus = selectedStatus === 'All' || user.status === selectedStatus;
            const matchesRole = selectedRole === 'All' || user.role === selectedRole;
            return matchesStatus && matchesRole;
        });

        renderUserTable(filteredData);
    }

    // Event listeners for filter changes
    filterStatusSelect.addEventListener('change', filterUsers);
    filterRoleSelect.addEventListener('change', filterUsers);

    // Initial render of the table when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        renderUserTable(userRegistrationsData);

        // Get elements for User Config Modal
        const configModal = document.getElementById('configModal');
        const configModalTitle = document.getElementById('configModalTitle');
        const userIdField = document.getElementById('userId');
        const userNameField = document.getElementById('userName');
        const userEmailField = document.getElementById('userEmail');
        const userPasswordField = document.getElementById('userPassword');
        const userRoleField = document.getElementById('userRole');
        const userStatusField = document.getElementById('userStatus');
        const userDescriptionField = document.getElementById('userDescription');

        /**
         * Opens the user configuration modal for adding new or editing existing users.
         * @param {string} mode - 'new' or 'edit'.
         * @param {string} [userJson=null] - JSON string of the user data if in 'edit' mode.
         */
        window.openConfigModal = function(mode, userJson = null) {
            configModal.classList.remove('hidden');
            if (mode === 'new') {
                configModalTitle.textContent = 'Add New User';
                userIdField.value = '';
                userNameField.value = '';
                userEmailField.value = '';
                userPasswordField.value = ''; // Clear password field for new user
                userRoleField.value = 'Resident'; // Default
                userStatusField.value = 'Pending'; // Default for new users
                userDescriptionField.value = '';
            } else if (mode === 'edit' && userJson) {
                const user = JSON.parse(decodeURIComponent(userJson));
                configModalTitle.textContent = 'Edit User';
                userIdField.value = user.id;
                userNameField.value = user.name;
                userEmailField.value = user.email;
                userPasswordField.value = ''; // Keep password field empty for editing (user can type new one)
                userRoleField.value = user.role;
                userStatusField.value = user.status;
                userDescriptionField.value = user.description;
            }
        };

        /**
         * Closes the user configuration modal.
         */
        window.closeConfigModal = function() {
            configModal.classList.add('hidden');
        };

        /**
         * Handles saving (adding or updating) a user.
         * @param {Event} event - The form submission event.
         */
        window.saveUser = function(event) {
            event.preventDefault(); // Prevent default form submission

            const id = userIdField.value;
            const name = userNameField.value.trim();
            const email = userEmailField.value.trim();
            const password = userPasswordField.value.trim(); // In a real app, this would be hashed
            const role = userRoleField.value;
            const status = userStatusField.value;
            const description = userDescriptionField.value.trim();

            if (!name || !email || !role || !status) {
                showAlert('Please fill in all required fields (Full Name, Email, Role, Status).', 'Input Error');
                return false;
            }

            const now = new Date();
            const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')}`;
            const loginTimestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;


            const newUser = {
                id: id || 'USR-' + (userRegistrationsData.length + 1).toString().padStart(3, '0'), // Simple ID generation
                name: name,
                email: email,
                role: role,
                status: status,
                registration_date: id ? userRegistrationsData.find(u => u.id === id)?.registration_date : timestamp, // Keep original date for edit
                last_login: id ? userRegistrationsData.find(u => u.id === id)?.last_login : 'N/A', // Keep original login for edit
                description: description
            };

            if (id) {
                // Update existing
                const index = userRegistrationsData.findIndex(user => user.id === id);
                if (index !== -1) {
                    userRegistrationsData[index] = newUser;
                    showAlert(`User "${name}" updated successfully!`, 'Success');
                }
            } else {
                // Add new
                userRegistrationsData.push(newUser);
                showAlert(`User "${name}" added successfully!`, 'Success');
            }

            closeConfigModal();
            filterUsers(); // Re-render table with updated data
            return false; // Prevent actual form submission
        };

        /**
         * Opens the user details modal with the given user's data.
         * @param {string} userJson - JSON string of the user entry.
         */
        window.viewDetails = function(userJson) {
            const user = JSON.parse(decodeURIComponent(userJson));
            document.getElementById('modalUserId').textContent = user.id;
            document.getElementById('modalUserName').textContent = user.name;
            document.getElementById('modalUserEmail').textContent = user.email;
            document.getElementById('modalUserRole').textContent = user.role;
            document.getElementById('modalUserStatus').textContent = user.status;
            document.getElementById('modalRegistrationDate').textContent = user.registration_date || 'N/A';
            document.getElementById('modalLastLogin').textContent = user.last_login || 'N/A';
            document.getElementById('modalUserDescription').textContent = user.description || 'No description provided.';

            document.getElementById('detailsModal').classList.remove('hidden');
        };

        // Close user details modal
        document.getElementById('closeDetailsModal').addEventListener('click', function() {
            document.getElementById('detailsModal').classList.add('hidden');
        });

        /**
         * Toggles the status of a user (e.g., Active/Inactive/Pending).
         * @param {string} id - The ID of the user to toggle.
         * @param {string} currentStatus - The current status of the user.
         */
        window.toggleUserStatus = function(id, currentStatus) {
            let newStatus;
            if (currentStatus === 'Active') {
                newStatus = 'Inactive';
            } else if (currentStatus === 'Inactive' || currentStatus === 'Blocked') {
                newStatus = 'Active';
            } else if (currentStatus === 'Pending') {
                newStatus = 'Active'; // Activate pending users
            }

            showConfirm(`Are you sure you want to change the status of user ${id} from ${currentStatus} to ${newStatus}?`, (confirmed) => {
                if (confirmed) {
                    const index = userRegistrationsData.findIndex(user => user.id === id);
                    if (index !== -1) {
                        userRegistrationsData[index].status = newStatus;
                        showAlert(`User ${id} status updated to ${newStatus}.`, 'Status Updated');
                        filterUsers(); // Re-render table
                    }
                }
            }, 'Toggle User Status');
        };

        /**
         * Deletes a user registration.
         * @param {string} id - The ID of the user to delete.
         */
        window.deleteUser = function(id) {
            showConfirm(`Are you sure you want to delete user ${id}? This action cannot be undone.`, (confirmed) => {
                if (confirmed) {
                    userRegistrationsData = userRegistrationsData.filter(user => user.id !== id);
                    showAlert(`User ${id} deleted successfully.`, 'User Deleted');
                    filterUsers(); // Re-render table
                }
            }, 'Delete User');
        };
    });
</script>
