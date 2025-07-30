<?php
// --- PHP PLACEHOLDER LOGIC ---
// This section simulates backend data for admin action logs.
// In a real application, this data would be fetched from a database.
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample admin action data
$adminActions = [
    [
        'id' => 'ACT-001',
        'admin_user' => 'Admin Marcus',
        'action_type' => 'User Management',
        'description' => 'Created new user: John Doe (USR-001)',
        'timestamp' => '2025-07-28 09:05 AM',
        'status' => 'Success'
    ],
    [
        'id' => 'ACT-002',
        'admin_user' => 'Admin Marcus',
        'action_type' => 'Alert Configuration',
        'description' => 'Updated alert setting: Flood Alerts (INT-001)',
        'timestamp' => '2025-07-28 02:10 PM',
        'status' => 'Success'
    ],
    [
        'id' => 'ACT-003',
        'admin_user' => 'Admin Jane',
        'action_type' => 'Geofence Management',
        'description' => 'Deleted geofence: School Zone B (GEO-005)',
        'timestamp' => '2025-07-27 04:30 PM',
        'status' => 'Success'
    ],
    [
        'id' => 'ACT-004',
        'admin_user' => 'Admin Marcus',
        'action_type' => 'System Update',
        'description' => 'Attempted system configuration update (failed due to permissions)',
        'timestamp' => '2025-07-27 11:15 AM',
        'status' => 'Failed'
    ],
    [
        'id' => 'ACT-005',
        'admin_user' => 'Admin Jane',
        'action_type' => 'Channel Management',
        'description' => 'Added new contact channel: Emergency Hotline (CCL-005)',
        'timestamp' => '2025-07-26 09:00 AM',
        'status' => 'Success'
    ]
];

// Sample options for dropdowns
$actionTypes = ['All', 'User Management', 'Alert Configuration', 'Geofence Management', 'Channel Management', 'System Update', 'Report Generation', 'Login/Logout'];
$adminUsers = ['All', 'Admin Marcus', 'Admin Jane', 'System'];
$actionStatuses = ['All', 'Success', 'Failed'];
?>

<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Admin Action Tracker</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Monitor Administrative Activities</h2>
        <p class="text-gray-700 leading-relaxed">
            The Admin Action Tracker provides a comprehensive log of all administrative activities within the emergency communication system. This module helps in auditing changes, ensuring accountability, and troubleshooting issues by providing a clear record of who did what, when, and the outcome of the action.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Admin Action Log</h2>

        <div class="mb-6 flex flex-wrap justify-between items-center gap-4">
            <!-- Filter Controls -->
            <div class="flex flex-wrap space-x-4 gap-y-2">
                <div>
                    <label for="filterAdmin" class="block text-sm font-medium text-gray-700">Filter by Admin:</label>
                    <select id="filterAdmin" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($adminUsers as $admin) : ?>
                            <option value="<?php echo htmlspecialchars($admin); ?>"><?php echo htmlspecialchars($admin); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="filterActionType" class="block text-sm font-medium text-gray-700">Filter by Action Type:</label>
                    <select id="filterActionType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($actionTypes as $type) : ?>
                            <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="filterStatus" class="block text-sm font-medium text-gray-700">Filter by Status:</label>
                    <select id="filterStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($actionStatuses as $status) : ?>
                            <option value="<?php echo htmlspecialchars($status); ?>"><?php echo htmlspecialchars($status); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <!-- No "Add New" button for logs, as they are generated by system actions -->
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Admin User</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Action Type</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Timestamp</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="actionTableBody">
                    <!-- Actions will be rendered here by JavaScript -->
                    <?php if (empty($adminActions)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No admin actions recorded.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Custom Modals -->
    <!-- Action Details Modal -->
    <div id="detailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">Action Details</h3>
            <div class="space-y-3 text-gray-700">
                <p><strong>ID:</strong> <span id="modalActionId"></span></p>
                <p><strong>Admin User:</strong> <span id="modalAdminUser"></span></p>
                <p><strong>Action Type:</strong> <span id="modalActionType"></span></p>
                <p><strong>Timestamp:</strong> <span id="modalTimestamp"></span></p>
                <p><strong>Status:</strong> <span id="modalStatus"></span></p>
                <p><strong>Description:</strong></p>
                <div id="modalDescription" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
            </div>
            <div class="mt-6 text-right">
                <button id="closeDetailsModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Alert Message Modal (re-used from other modules) -->
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

    <!-- Confirmation Modal (re-used from other modules) -->
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

</div>

<script>
    // Initial admin actions data from PHP
    let adminActionsData = <?php echo json_encode($adminActions); ?>;

    // Get references to DOM elements
    const actionTableBody = document.getElementById('actionTableBody');
    const filterAdminSelect = document.getElementById('filterAdmin');
    const filterActionTypeSelect = document.getElementById('filterActionType');
    const filterStatusSelect = document.getElementById('filterStatus');

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
     * Renders the admin action table based on the provided data.
     * @param {Array} dataToRender - The array of action objects to display.
     */
    function renderActionTable(dataToRender) {
        actionTableBody.innerHTML = ''; // Clear existing rows

        if (dataToRender.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `<td colspan="7" class="px-6 py-4 text-center text-gray-500">No admin actions found matching filters.</td>`;
            actionTableBody.appendChild(noDataRow);
            return;
        }

        dataToRender.forEach(action => {
            const row = document.createElement('tr');
            row.classList.add('hover:bg-gray-50');

            // Determine status badge color
            let statusClass = '';
            if (action.status === 'Success') statusClass = 'bg-green-100 text-green-800';
            else if (action.status === 'Failed') statusClass = 'bg-red-100 text-red-800';
            else statusClass = 'bg-gray-100 text-gray-800'; // Default

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${action.id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${action.admin_user}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${action.action_type}</td>
                <td class="px-6 py-4 text-sm text-gray-700 truncate max-w-xs">${action.description}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${action.timestamp || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                        ${action.status}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="viewDetails('${encodeURIComponent(JSON.stringify(action))}')" class="text-indigo-600 hover:text-indigo-900">View Details</button>
                </td>
            `;
            actionTableBody.appendChild(row);
        });
    }

    /**
     * Filters the admin action data based on selected criteria and re-renders the table.
     */
    function filterActions() {
        const selectedAdmin = filterAdminSelect.value;
        const selectedActionType = filterActionTypeSelect.value;
        const selectedStatus = filterStatusSelect.value;

        const filteredData = adminActionsData.filter(action => {
            const matchesAdmin = selectedAdmin === 'All' || action.admin_user === selectedAdmin;
            const matchesActionType = selectedActionType === 'All' || action.action_type === selectedActionType;
            const matchesStatus = selectedStatus === 'All' || action.status === selectedStatus;
            return matchesAdmin && matchesActionType && matchesStatus;
        });

        renderActionTable(filteredData);
    }

    // Event listeners for filter changes
    filterAdminSelect.addEventListener('change', filterActions);
    filterActionTypeSelect.addEventListener('change', filterActions);
    filterStatusSelect.addEventListener('change', filterActions);

    // Initial render of the table when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        renderActionTable(adminActionsData);

        // Get elements for Action Details Modal
        const detailsModal = document.getElementById('detailsModal');
        const modalActionId = document.getElementById('modalActionId');
        const modalAdminUser = document.getElementById('modalAdminUser');
        const modalActionType = document.getElementById('modalActionType');
        const modalTimestamp = document.getElementById('modalTimestamp');
        const modalStatus = document.getElementById('modalStatus');
        const modalDescription = document.getElementById('modalDescription');
        const closeDetailsModal = document.getElementById('closeDetailsModal');

        /**
         * Opens the action details modal with the given action's data.
         * @param {string} actionJson - JSON string of the action entry.
         */
        window.viewDetails = function(actionJson) {
            const action = JSON.parse(decodeURIComponent(actionJson));
            modalActionId.textContent = action.id;
            modalAdminUser.textContent = action.admin_user;
            modalActionType.textContent = action.action_type;
            modalTimestamp.textContent = action.timestamp || 'N/A';
            modalStatus.textContent = action.status;
            modalDescription.textContent = action.description || 'No detailed description provided.';

            detailsModal.classList.remove('hidden');
        };

        // Close action details modal
        closeDetailsModal.addEventListener('click', function() {
            detailsModal.classList.add('hidden');
        });
    });
</script>
