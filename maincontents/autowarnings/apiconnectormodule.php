<?php
// --- PHP PLACEHOLDER LOGIC ---
// This section simulates backend data for API connections.
// In a real application, this data would be fetched from a database.
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample API connection data
$apiConnections = [
    [
        'id' => 'API-001',
        'name' => 'Weather Service API',
        'type' => 'Weather Data',
        'endpoint' => 'https://api.weather.com/v1',
        'auth_type' => 'API Key',
        'auth_value' => 'sk_live_xyz123abc', // Sensitive data, masked for display
        'status' => 'Active',
        'last_tested' => '2025-07-25 10:00 AM',
        'description' => 'Connects to a third-party weather service for real-time weather updates.'
    ],
    [
        'id' => 'API-002',
        'name' => 'Mapping Service Geocoding',
        'type' => 'Geocoding',
        'endpoint' => 'https://maps.example.com/geocode',
        'auth_type' => 'OAuth2',
        'auth_value' => '**********', // Masked
        'status' => 'Inactive',
        'last_tested' => '2025-07-20 02:30 PM',
        'description' => 'Provides geocoding services to convert addresses to coordinates.'
    ],
    [
        'id' => 'API-003',
        'name' => 'SMS Gateway Provider',
        'type' => 'SMS Messaging',
        'endpoint' => 'https://sms.gateway.net/api/send',
        'auth_type' => 'Bearer Token',
        'auth_value' => '**********', // Masked
        'status' => 'Active',
        'last_tested' => '2025-07-26 09:15 AM',
        'description' => 'Used for sending outbound SMS notifications to recipients.'
    ]
];

// Sample options for dropdowns
$apiTypes = ['Weather Data', 'Geocoding', 'SMS Messaging', 'Email Service', 'Other'];
$authTypes = ['API Key', 'OAuth2', 'Bearer Token', 'Basic Auth', 'None'];
$connectionStatuses = ['All', 'Active', 'Inactive'];
?>

<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">API Connector Module</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Manage External API Integrations</h2>
        <p class="text-gray-700 leading-relaxed">
            The API Connector Module allows administrators to configure, manage, and test connections to various external services and third-party APIs. This enables seamless data exchange and extends the system's capabilities, such as fetching real-time weather data, sending SMS via external gateways, or integrating with mapping services.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Configured API Connections</h2>

        <div class="mb-6 flex justify-between items-center">
            <!-- Filter Controls -->
            <div class="flex space-x-4">
                <div>
                    <label for="filterStatus" class="block text-sm font-medium text-gray-700">Filter by Status:</label>
                    <select id="filterStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($connectionStatuses as $status) : ?>
                            <option value="<?php echo htmlspecialchars($status); ?>"><?php echo htmlspecialchars($status); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="filterType" class="block text-sm font-medium text-gray-700">Filter by Type:</label>
                    <select id="filterType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="All">All</option>
                        <?php foreach ($apiTypes as $type) : ?>
                            <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button onclick="openApiConfigModal('new')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Add New Connection
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Endpoint</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Last Tested</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="apiTableBody">
                    <!-- API connections will be rendered here by JavaScript -->
                    <?php if (empty($apiConnections)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No API connections configured.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Custom Modals (re-using pattern) -->
    <!-- API Configuration Modal (Add/Edit) -->
    <div id="apiConfigModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4" id="apiConfigModalTitle">Add New API Connection</h3>
            <form id="apiConfigForm" onsubmit="return saveApiConnection(event)">
                <input type="hidden" id="apiConnectionId">
                <div class="mb-4">
                    <label for="apiName" class="block text-sm font-medium text-gray-700">Connection Name</label>
                    <input type="text" id="apiName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="apiType" class="block text-sm font-medium text-gray-700">API Type</label>
                    <select id="apiType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <?php foreach ($apiTypes as $type) : ?>
                            <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="apiEndpoint" class="block text-sm font-medium text-gray-700">API Endpoint URL</label>
                    <input type="url" id="apiEndpoint" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="e.g., https://api.example.com/data" required>
                </div>
                <div class="mb-4">
                    <label for="authType" class="block text-sm font-medium text-gray-700">Authentication Type</label>
                    <select id="authType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <?php foreach ($authTypes as $auth) : ?>
                            <option value="<?php echo htmlspecialchars($auth); ?>"><?php echo htmlspecialchars($auth); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="authValue" class="block text-sm font-medium text-gray-700">Authentication Value (e.g., API Key, Token)</label>
                    <input type="text" id="authValue" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter API key or token" required>
                </div>
                <div class="mb-4">
                    <label for="apiDescription" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                    <textarea id="apiDescription" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Brief description of this API connection"></textarea>
                </div>
                <div class="mb-4">
                    <label for="apiStatus" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="apiStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeApiConfigModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Save Connection
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- API Details Modal -->
    <div id="apiDetailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">API Connection Details</h3>
            <div class="space-y-3 text-gray-700">
                <p><strong>ID:</strong> <span id="modalApiId"></span></p>
                <p><strong>Name:</strong> <span id="modalApiName"></span></p>
                <p><strong>Type:</strong> <span id="modalApiType"></span></p>
                <p><strong>Endpoint:</strong> <span id="modalApiEndpoint"></span></p>
                <p><strong>Auth Type:</strong> <span id="modalAuthType"></span></p>
                <p><strong>Auth Value:</strong> <span id="modalAuthValue"></span></p>
                <p><strong>Status:</strong> <span id="modalApiStatus"></span></p>
                <p><strong>Last Tested:</strong> <span id="modalLastTested"></span></p>
                <p><strong>Description:</strong></p>
                <div id="modalApiDescription" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
            </div>
            <div class="mt-6 text-right">
                <button id="closeApiDetailsModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
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
                <button id="alertCloseBtn" class="px-4 py-2 text-sm font-medium text-blue-600 rounded-md hover:bg-blue-700">
                    OK
                </button>
            </div>
        </div>
    </div>

</div>

<script>
    // Initial API connections data from PHP
    let apiConnectionsData = <?php echo json_encode($apiConnections); ?>;

    // Get references to DOM elements
    const apiTableBody = document.getElementById('apiTableBody');
    const filterStatusSelect = document.getElementById('filterStatus');
    const filterTypeSelect = document.getElementById('filterType');

    // Custom Alert Modal elements
    const alertModal = document.getElementById('alertModal');
    const alertModalTitle = document.getElementById('alertModalTitle');
    const alertModalMessage = document.getElementById('alertModalMessage');
    const alertCloseBtn = document.getElementById('alertCloseBtn');

    // Custom Confirmation Modal elements
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
     * Renders the API connections table based on the provided data.
     * @param {Array} dataToRender - The array of API connection objects to display.
     */
    function renderApiTable(dataToRender) {
        apiTableBody.innerHTML = ''; // Clear existing rows

        if (dataToRender.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `<td colspan="7" class="px-6 py-4 text-center text-gray-500">No API connections found matching filters.</td>`;
            apiTableBody.appendChild(noDataRow);
            return;
        }

        dataToRender.forEach(connection => {
            const row = document.createElement('tr');
            row.classList.add('hover:bg-gray-50');

            // Determine status badge color
            let statusClass = '';
            if (connection.status === 'Active') statusClass = 'bg-green-100 text-green-800';
            else if (connection.status === 'Inactive') statusClass = 'bg-red-100 text-red-800';
            else statusClass = 'bg-gray-100 text-gray-800'; // Default

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${connection.id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${connection.name}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${connection.type}</td>
                <td class="px-6 py-4 text-sm text-gray-700 truncate max-w-xs">${connection.endpoint}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                        ${connection.status}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${connection.last_tested || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="viewApiDetails('${encodeURIComponent(JSON.stringify(connection))}')" class="text-indigo-600 hover:text-indigo-900 mr-4">View</button>
                    <button onclick="openApiConfigModal('edit', '${encodeURIComponent(JSON.stringify(connection))}')" class="text-blue-600 hover:text-blue-900 mr-4">Edit</button>
                    <button onclick="testApiConnection('${connection.id}')" class="text-yellow-600 hover:text-yellow-900 mr-4">Test</button>
                    <button onclick="deleteApiConnection('${connection.id}')" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
            `;
            apiTableBody.appendChild(row);
        });
    }

    /**
     * Filters the API connections data based on selected criteria and re-renders the table.
     */
    function filterApiConnections() {
        const selectedStatus = filterStatusSelect.value;
        const selectedType = filterTypeSelect.value;

        const filteredData = apiConnectionsData.filter(connection => {
            const matchesStatus = selectedStatus === 'All' || connection.status === selectedStatus;
            const matchesType = selectedType === 'All' || connection.type === selectedType;
            return matchesStatus && matchesType;
        });

        renderApiTable(filteredData);
    }

    // Event listeners for filter changes
    filterStatusSelect.addEventListener('change', filterApiConnections);
    filterTypeSelect.addEventListener('change', filterApiConnections);

    // Initial render of the table when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        renderApiTable(apiConnectionsData);

        // Get elements for API Config Modal
        const apiConfigModal = document.getElementById('apiConfigModal');
        const apiConfigModalTitle = document.getElementById('apiConfigModalTitle');
        const apiConnectionIdField = document.getElementById('apiConnectionId');
        const apiNameField = document.getElementById('apiName');
        const apiTypeField = document.getElementById('apiType');
        const apiEndpointField = document.getElementById('apiEndpoint');
        const authTypeField = document.getElementById('authType');
        const authValueField = document.getElementById('authValue');
        const apiDescriptionField = document.getElementById('apiDescription');
        const apiStatusField = document.getElementById('apiStatus');

        /**
         * Opens the API configuration modal for adding new or editing existing connections.
         * @param {string} mode - 'new' or 'edit'.
         * @param {string} [apiJson=null] - JSON string of the API connection data if in 'edit' mode.
         */
        window.openApiConfigModal = function(mode, apiJson = null) {
            apiConfigModal.classList.remove('hidden');
            if (mode === 'new') {
                apiConfigModalTitle.textContent = 'Add New API Connection';
                apiConnectionIdField.value = '';
                apiNameField.value = '';
                apiTypeField.value = 'Weather Data'; // Default
                apiEndpointField.value = '';
                authTypeField.value = 'API Key'; // Default
                authValueField.value = '';
                apiDescriptionField.value = '';
                apiStatusField.value = 'Active';
            } else if (mode === 'edit' && apiJson) {
                const connection = JSON.parse(decodeURIComponent(apiJson));
                apiConfigModalTitle.textContent = 'Edit API Connection';
                apiConnectionIdField.value = connection.id;
                apiNameField.value = connection.name;
                apiTypeField.value = connection.type;
                apiEndpointField.value = connection.endpoint;
                authTypeField.value = connection.auth_type;
                // For security, do not pre-fill sensitive auth_value in edit mode unless explicitly desired
                // User should re-enter it or it should be handled by backend.
                authValueField.value = ''; // Clear for re-entry or leave blank if not changing
                apiDescriptionField.value = connection.description;
                apiStatusField.value = connection.status;
            }
        };

        /**
         * Closes the API configuration modal.
         */
        window.closeApiConfigModal = function() {
            apiConfigModal.classList.add('hidden');
        };

        /**
         * Handles saving (adding or updating) an API connection.
         * @param {Event} event - The form submission event.
         */
        window.saveApiConnection = function(event) {
            event.preventDefault(); // Prevent default form submission

            const id = apiConnectionIdField.value;
            const name = apiNameField.value.trim();
            const type = apiTypeField.value;
            const endpoint = apiEndpointField.value.trim();
            const auth_type = authTypeField.value;
            const auth_value = authValueField.value.trim(); // In real app, handle securely
            const description = apiDescriptionField.value.trim();
            const status = apiStatusField.value;

            if (!name || !endpoint || !auth_value) {
                showAlert('Please fill in all required fields (Name, Endpoint, Auth Value).', 'Input Error');
                return false;
            }

            const now = new Date();
            const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;

            const newConnection = {
                id: id || 'API-' + (apiConnectionsData.length + 1).toString().padStart(3, '0'), // Simple ID generation
                name: name,
                type: type,
                endpoint: endpoint,
                auth_type: auth_type,
                auth_value: auth_value, // In real app, this would be hashed/encrypted
                status: status,
                last_tested: timestamp,
                description: description
            };

            if (id) {
                // Update existing
                const index = apiConnectionsData.findIndex(conn => conn.id === id);
                if (index !== -1) {
                    apiConnectionsData[index] = newConnection;
                    showAlert(`API Connection "${name}" updated successfully!`, 'Success');
                }
            } else {
                // Add new
                apiConnectionsData.push(newConnection);
                showAlert(`API Connection "${name}" added successfully!`, 'Success');
            }

            closeApiConfigModal();
            filterApiConnections(); // Re-render table with updated data
            return false; // Prevent actual form submission
        };

        /**
         * Opens the API details modal with the given connection's data.
         * @param {string} apiJson - JSON string of the API connection entry.
         */
        window.viewApiDetails = function(apiJson) {
            const connection = JSON.parse(decodeURIComponent(apiJson));
            document.getElementById('modalApiId').textContent = connection.id;
            document.getElementById('modalApiName').textContent = connection.name;
            document.getElementById('modalApiType').textContent = connection.type;
            document.getElementById('modalApiEndpoint').textContent = connection.endpoint;
            document.getElementById('modalAuthType').textContent = connection.auth_type;
            // Display masked auth value for security, or full value if appropriate for admin view
            document.getElementById('modalAuthValue').textContent = connection.auth_value.replace(/./g, '*'); // Mask all characters
            document.getElementById('modalApiStatus').textContent = connection.status;
            document.getElementById('modalLastTested').textContent = connection.last_tested || 'N/A';
            document.getElementById('modalApiDescription').textContent = connection.description || 'No description provided.';

            document.getElementById('apiDetailsModal').classList.remove('hidden');
        };

        // Close API details modal
        document.getElementById('closeApiDetailsModal').addEventListener('click', function() {
            document.getElementById('apiDetailsModal').classList.add('hidden');
        });

        /**
         * Simulates testing an API connection.
         * In a real app, this would involve an AJAX call to a backend endpoint that performs the actual API call.
         * @param {string} id - The ID of the API connection to test.
         */
        window.testApiConnection = function(id) {
            showConfirm(`Are you sure you want to test API connection ${id}? This may take a moment.`, (confirmed) => {
                if (confirmed) {
                    showAlert(`Simulating test for API connection ${id}... (Check console for simulated result)`, 'Testing API');
                    const index = apiConnectionsData.findIndex(conn => conn.id === id);
                    if (index !== -1) {
                        // Simulate API test success/failure
                        const isSuccess = Math.random() > 0.3; // 70% chance of success
                        const now = new Date();
                        const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;
                        apiConnectionsData[index].last_tested = timestamp;
                        apiConnectionsData[index].status = isSuccess ? 'Active' : 'Inactive';

                        if (isSuccess) {
                            console.log(`API ${id} Test Result: SUCCESS! Data received: { "status": "ok", "data": "simulated" }`);
                            showAlert(`API connection ${id} tested successfully! Status: Active.`, 'Test Result');
                        } else {
                            console.error(`API ${id} Test Result: FAILED! Error: "Connection timeout or invalid credentials."`);
                            showAlert(`API connection ${id} test failed! Status: Inactive. Check configuration.`, 'Test Result (Failed)');
                        }
                        filterApiConnections(); // Re-render table to show updated status/timestamp
                    }
                }
            }, 'Test API Connection');
        };

        /**
         * Deletes an API connection.
         * @param {string} id - The ID of the API connection to delete.
         */
        window.deleteApiConnection = function(id) {
            showConfirm(`Are you sure you want to delete API connection ${id}? This action cannot be undone.`, (confirmed) => {
                if (confirmed) {
                    apiConnectionsData = apiConnectionsData.filter(conn => conn.id !== id);
                    showAlert(`API connection ${id} deleted successfully.`, 'Connection Deleted');
                    filterApiConnections(); // Re-render table
                }
            }, 'Delete API Connection');
        };
    });
</script>
