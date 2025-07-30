<?php
// --- PHP PLACEHOLDER LOGIC ---
// This section simulates backend data for feed health monitors.
// In a real application, this data would be fetched from a database.
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample feed health monitor data
$feedMonitors = [
    [
        'id' => 'FHM-001',
        'name' => 'Real-time Weather Feed',
        'source' => 'External Weather API',
        'type' => 'Weather Data',
        'status' => 'Healthy',
        'last_update' => '2025-07-28 06:15 AM',
        'latency' => '5s',
        'error_count' => 0,
        'description' => 'Monitors the incoming data stream from the primary weather service API.'
    ],
    [
        'id' => 'FHM-002',
        'name' => 'Social Media Incident Stream',
        'source' => 'Twitter API',
        'type' => 'Social Media',
        'status' => 'Degraded',
        'last_update' => '2025-07-28 06:00 AM',
        'latency' => '2min',
        'error_count' => 15,
        'description' => 'Tracks social media mentions for potential incident reports. Experiencing high latency.'
    ],
    [
        'id' => 'FHM-003',
        'name' => 'Local Sensor Network Data',
        'source' => 'Internal Sensor Array',
        'type' => 'Sensor Data',
        'status' => 'Offline',
        'last_update' => '2025-07-27 08:00 PM',
        'latency' => 'N/A',
        'error_count' => 50,
        'description' => 'Monitors environmental data from local sensors. Connection lost.'
    ],
    [
        'id' => 'FHM-004',
        'name' => 'News Alert RSS Feed',
        'source' => 'Local News Outlet RSS',
        'type' => 'News Alert',
        'status' => 'Healthy',
        'last_update' => '2025-07-28 05:30 AM',
        'latency' => '10s',
        'error_count' => 0,
        'description' => 'Pulls news headlines and alerts from a local news agency via RSS.'
    ]
];

// Sample options for dropdowns
$feedTypes = ['All', 'Weather Data', 'Social Media', 'Sensor Data', 'News Alert', 'Other'];
$feedStatuses = ['All', 'Healthy', 'Degraded', 'Offline', 'Error'];
?>

<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Feed Health Monitor</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Monitor Incoming Data Feed Health</h2>
        <p class="text-gray-700 leading-relaxed">
            The Feed Health Monitor provides real-time insights into the status and performance of all integrated data feeds. This module helps administrators quickly identify and troubleshoot issues with external data sources, ensuring the system always has access to the most current and accurate information for emergency response.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Configured Data Feeds</h2>

        <div class="mb-6 flex justify-between items-center">
            <!-- Filter Controls -->
            <div class="flex space-x-4">
                <div>
                    <label for="filterStatus" class="block text-sm font-medium text-gray-700">Filter by Status:</label>
                    <select id="filterStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($feedStatuses as $status) : ?>
                            <option value="<?php echo htmlspecialchars($status); ?>"><?php echo htmlspecialchars($status); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="filterType" class="block text-sm font-medium text-gray-700">Filter by Type:</label>
                    <select id="filterType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($feedTypes as $type) : ?>
                            <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button onclick="openMonitorConfigModal('new')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Add New Monitor
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Source</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Last Update</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Latency</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Errors</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="monitorTableBody">
                    <!-- Feed monitors will be rendered here by JavaScript -->
                    <?php if (empty($feedMonitors)): ?>
                        <tr>
                            <td colspan="9" class="px-6 py-4 text-center text-gray-500">No feed monitors configured.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Custom Modals (re-using pattern) -->
    <!-- Monitor Configuration Modal (Add/Edit) -->
    <div id="monitorConfigModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4" id="monitorConfigModalTitle">Add New Feed Monitor</h3>
            <form id="monitorConfigForm" onsubmit="return saveMonitor(event)">
                <input type="hidden" id="monitorId">
                <div class="mb-4">
                    <label for="monitorName" class="block text-sm font-medium text-gray-700">Monitor Name</label>
                    <input type="text" id="monitorName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="monitorSource" class="block text-sm font-medium text-gray-700">Data Source</label>
                    <input type="text" id="monitorSource" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="e.g., External Weather API" required>
                </div>
                <div class="mb-4">
                    <label for="monitorType" class="block text-sm font-medium text-gray-700">Feed Type</label>
                    <select id="monitorType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <?php foreach (array_slice($feedTypes, 1) as $type) : // Exclude 'All' ?>
                            <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="monitorDescription" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                    <textarea id="monitorDescription" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Brief description of this data feed"></textarea>
                </div>
                <div class="mb-4">
                    <label for="monitorStatus" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="monitorStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="Healthy">Healthy</option>
                        <option value="Degraded">Degraded</option>
                        <option value="Offline">Offline</option>
                        <option value="Error">Error</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeMonitorConfigModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Save Monitor
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Monitor Details Modal -->
    <div id="monitorDetailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">Feed Monitor Details</h3>
            <div class="space-y-3 text-gray-700">
                <p><strong>ID:</strong> <span id="modalMonitorId"></span></p>
                <p><strong>Name:</strong> <span id="modalMonitorName"></span></p>
                <p><strong>Source:</strong> <span id="modalMonitorSource"></span></p>
                <p><strong>Type:</strong> <span id="modalMonitorType"></span></p>
                <p><strong>Status:</strong> <span id="modalMonitorStatus"></span></p>
                <p><strong>Last Update:</strong> <span id="modalLastUpdate"></span></p>
                <p><strong>Latency:</strong> <span id="modalLatency"></span></p>
                <p><strong>Error Count:</strong> <span id="modalErrorCount"></span></p>
                <p><strong>Description:</strong></p>
                <div id="modalMonitorDescription" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
            </div>
            <div class="mt-6 text-right">
                <button id="closeMonitorDetailsModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
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
    // Initial feed monitors data from PHP
    let feedMonitorsData = <?php echo json_encode($feedMonitors); ?>;

    // Get references to DOM elements
    const monitorTableBody = document.getElementById('monitorTableBody');
    const filterStatusSelect = document.getElementById('filterStatus');
    const filterTypeSelect = document.getElementById('filterType');

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
     * Renders the feed monitors table based on the provided data.
     * @param {Array} dataToRender - The array of monitor objects to display.
     */
    function renderMonitorTable(dataToRender) {
        monitorTableBody.innerHTML = ''; // Clear existing rows

        if (dataToRender.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `<td colspan="9" class="px-6 py-4 text-center text-gray-500">No feed monitors configured.</td>`;
            monitorTableBody.appendChild(noDataRow);
            return;
        }

        dataToRender.forEach(monitor => {
            const row = document.createElement('tr');
            row.classList.add('hover:bg-gray-50');

            // Determine status badge color
            let statusClass = '';
            if (monitor.status === 'Healthy') statusClass = 'bg-green-100 text-green-800';
            else if (monitor.status === 'Degraded') statusClass = 'bg-yellow-100 text-yellow-800';
            else if (monitor.status === 'Offline' || monitor.status === 'Error') statusClass = 'bg-red-100 text-red-800';
            else statusClass = 'bg-gray-100 text-gray-800'; // Default

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${monitor.id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${monitor.name}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${monitor.source}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${monitor.type}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                        ${monitor.status}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${monitor.last_update || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${monitor.latency || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${monitor.error_count}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="viewMonitorDetails('${encodeURIComponent(JSON.stringify(monitor))}')" class="text-indigo-600 hover:text-indigo-900 mr-4">View</button>
                    <button onclick="openMonitorConfigModal('edit', '${encodeURIComponent(JSON.stringify(monitor))}')" class="text-blue-600 hover:text-blue-900 mr-4">Edit</button>
                    <button onclick="testFeedMonitor('${monitor.id}')" class="text-yellow-600 hover:text-yellow-900 mr-4">Test</button>
                    <button onclick="deleteFeedMonitor('${monitor.id}')" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
            `;
            monitorTableBody.appendChild(row);
        });
    }

    /**
     * Filters the feed monitors data based on selected criteria and re-renders the table.
     */
    function filterMonitors() {
        const selectedStatus = filterStatusSelect.value;
        const selectedType = filterTypeSelect.value;

        const filteredData = feedMonitorsData.filter(monitor => {
            const matchesStatus = selectedStatus === 'All' || monitor.status === selectedStatus;
            const matchesType = selectedType === 'All' || monitor.type === selectedType;
            return matchesStatus && matchesType;
        });

        renderMonitorTable(filteredData);
    }

    // Event listeners for filter changes
    filterStatusSelect.addEventListener('change', filterMonitors);
    filterTypeSelect.addEventListener('change', filterMonitors);

    // Initial render of the table when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        renderMonitorTable(feedMonitorsData);

        // Get elements for Monitor Config Modal
        const monitorConfigModal = document.getElementById('monitorConfigModal');
        const monitorConfigModalTitle = document.getElementById('monitorConfigModalTitle');
        const monitorIdField = document.getElementById('monitorId');
        const monitorNameField = document.getElementById('monitorName');
        const monitorSourceField = document.getElementById('monitorSource');
        const monitorTypeField = document.getElementById('monitorType');
        const monitorDescriptionField = document.getElementById('monitorDescription');
        const monitorStatusField = document.getElementById('monitorStatus');

        /**
         * Opens the monitor configuration modal for adding new or editing existing monitors.
         * @param {string} mode - 'new' or 'edit'.
         * @param {string} [monitorJson=null] - JSON string of the monitor data if in 'edit' mode.
         */
        window.openMonitorConfigModal = function(mode, monitorJson = null) {
            monitorConfigModal.classList.remove('hidden');
            if (mode === 'new') {
                monitorConfigModalTitle.textContent = 'Add New Feed Monitor';
                monitorIdField.value = '';
                monitorNameField.value = '';
                monitorSourceField.value = '';
                monitorTypeField.value = 'Weather Data'; // Default
                monitorDescriptionField.value = '';
                monitorStatusField.value = 'Healthy';
            } else if (mode === 'edit' && monitorJson) {
                const monitor = JSON.parse(decodeURIComponent(monitorJson));
                monitorConfigModalTitle.textContent = 'Edit Feed Monitor';
                monitorIdField.value = monitor.id;
                monitorNameField.value = monitor.name;
                monitorSourceField.value = monitor.source;
                monitorTypeField.value = monitor.type;
                monitorDescriptionField.value = monitor.description;
                monitorStatusField.value = monitor.status;
            }
        };

        /**
         * Closes the monitor configuration modal.
         */
        window.closeMonitorConfigModal = function() {
            monitorConfigModal.classList.add('hidden');
        };

        /**
         * Handles saving (adding or updating) a feed monitor.
         * @param {Event} event - The form submission event.
         */
        window.saveMonitor = function(event) {
            event.preventDefault(); // Prevent default form submission

            const id = monitorIdField.value;
            const name = monitorNameField.value.trim();
            const source = monitorSourceField.value.trim();
            const type = monitorTypeField.value;
            const description = monitorDescriptionField.value.trim();
            const status = monitorStatusField.value;

            if (!name || !source || !type) {
                showAlert('Please fill in all required fields (Monitor Name, Data Source, Feed Type).', 'Input Error');
                return false;
            }

            const now = new Date();
            const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;

            const newMonitor = {
                id: id || 'FHM-' + (feedMonitorsData.length + 1).toString().padStart(3, '0'), // Simple ID generation
                name: name,
                source: source,
                type: type,
                status: status,
                last_update: timestamp, // Set last_update on save/creation
                latency: 'N/A',
                error_count: 0,
                description: description
            };

            if (id) {
                // Update existing
                const index = feedMonitorsData.findIndex(mon => mon.id === id);
                if (index !== -1) {
                    // Preserve last_update, latency, error_count if not explicitly changed
                    newMonitor.last_update = feedMonitorsData[index].last_update;
                    newMonitor.latency = feedMonitorsData[index].latency;
                    newMonitor.error_count = feedMonitorsData[index].error_count;
                    feedMonitorsData[index] = newMonitor;
                    showAlert(`Feed Monitor "${name}" updated successfully!`, 'Success');
                }
            } else {
                // Add new
                feedMonitorsData.push(newMonitor);
                showAlert(`Feed Monitor "${name}" added successfully!`, 'Success');
            }

            closeMonitorConfigModal();
            filterMonitors(); // Re-render table with updated data
            return false; // Prevent actual form submission
        };

        /**
         * Opens the monitor details modal with the given monitor's data.
         * @param {string} monitorJson - JSON string of the monitor entry.
         */
        window.viewMonitorDetails = function(monitorJson) {
            const monitor = JSON.parse(decodeURIComponent(monitorJson));
            document.getElementById('modalMonitorId').textContent = monitor.id;
            document.getElementById('modalMonitorName').textContent = monitor.name;
            document.getElementById('modalMonitorSource').textContent = monitor.source;
            document.getElementById('modalMonitorType').textContent = monitor.type;
            document.getElementById('modalMonitorStatus').textContent = monitor.status;
            document.getElementById('modalLastUpdate').textContent = monitor.last_update || 'N/A';
            document.getElementById('modalLatency').textContent = monitor.latency || 'N/A';
            document.getElementById('modalErrorCount').textContent = monitor.error_count;
            document.getElementById('modalMonitorDescription').textContent = monitor.description || 'No description provided.';

            document.getElementById('monitorDetailsModal').classList.remove('hidden');
        };

        // Close monitor details modal
        document.getElementById('closeMonitorDetailsModal').addEventListener('click', function() {
            document.getElementById('monitorDetailsModal').classList.add('hidden');
        });

        /**
         * Simulates testing a feed monitor.
         * In a real app, this would involve an AJAX call to a backend endpoint that performs the actual feed check.
         * @param {string} id - The ID of the feed monitor to test.
         */
        window.testFeedMonitor = function(id) {
            showConfirm(`Are you sure you want to test feed monitor ${id}? This will simulate a data pull.`, (confirmed) => {
                if (confirmed) {
                    showAlert(`Simulating test for feed monitor ${id}... (Check console for simulated result)`, 'Testing Feed');
                    const index = feedMonitorsData.findIndex(mon => mon.id === id);
                    if (index !== -1) {
                        // Simulate feed test success/failure and update status, latency, error_count
                        const isHealthy = Math.random() > 0.2; // 80% chance of healthy
                        const now = new Date();
                        const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;

                        if (isHealthy) {
                            const simulatedLatency = Math.floor(Math.random() * 10) + 1; // 1-10 seconds
                            feedMonitorsData[index].status = 'Healthy';
                            feedMonitorsData[index].last_update = timestamp;
                            feedMonitorsData[index].latency = `${simulatedLatency}s`;
                            feedMonitorsData[index].error_count = Math.max(0, feedMonitorsData[index].error_count - 5); // Reduce errors on success
                            console.log(`Feed ${id} Test Result: SUCCESS! Status: Healthy, Latency: ${simulatedLatency}s`);
                            showAlert(`Feed monitor ${id} tested successfully! Status: Healthy.`, 'Test Result');
                        } else {
                            const errorType = Math.random() > 0.5 ? 'Offline' : 'Error';
                            feedMonitorsData[index].status = errorType;
                            feedMonitorsData[index].last_update = timestamp; // Still update last_checked time
                            feedMonitorsData[index].latency = 'N/A';
                            feedMonitorsData[index].error_count += Math.floor(Math.random() * 10) + 1; // Increase errors on failure
                            console.error(`Feed ${id} Test Result: FAILED! Status: ${errorType}. Error details: "Connection failed or data malformed."`);
                            showAlert(`Feed monitor ${id} test failed! Status: ${errorType}. Check source.`, 'Test Result (Failed)');
                        }
                        filterMonitors(); // Re-render table to show updated status/timestamp/metrics
                    }
                }
            }, 'Test Feed Monitor');
        };

        /**
         * Deletes a feed monitor.
         * @param {string} id - The ID of the feed monitor to delete.
         */
        window.deleteFeedMonitor = function(id) {
            showConfirm(`Are you sure you want to delete feed monitor ${id}? This action cannot be undone.`, (confirmed) => {
                if (confirmed) {
                    feedMonitorsData = feedMonitorsData.filter(mon => mon.id !== id);
                    showAlert(`Feed monitor ${id} deleted successfully.`, 'Monitor Deleted');
                    filterMonitors(); // Re-render table
                }
            }, 'Delete Feed Monitor');
        };
    });
</script>
