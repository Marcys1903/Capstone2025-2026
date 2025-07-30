<?php
// --- PHP PLACEHOLDER LOGIC ---
// This section simulates backend data for real-time alert triggers.
// In a real application, this data would be fetched from a database.
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample real-time alert trigger data
$alertTriggers = [
    [
        'id' => 'RAT-001',
        'name' => 'High Flood Level Trigger',
        'trigger_condition' => 'DataFeed: "Flood Sensor A", Value: > 5 meters, Duration: 10 minutes',
        'alert_template_id' => 'TEMPLATE-FLOOD-URGENT',
        'status' => 'Active',
        'last_triggered' => '2025-07-28 07:00 AM',
        'description' => 'Triggers a critical flood alert if water level exceeds 5 meters for 10 minutes.'
    ],
    [
        'id' => 'RAT-002',
        'name' => 'Earthquake Magnitude Alert',
        'trigger_condition' => 'DataFeed: "Seismic Sensor B", Magnitude: >= 6.0',
        'alert_template_id' => 'TEMPLATE-EQ-SEVERE',
        'status' => 'Active',
        'last_triggered' => 'N/A',
        'description' => 'Issues a severe earthquake alert for magnitudes 6.0 or higher.'
    ],
    [
        'id' => 'RAT-003',
        'name' => 'Missing Person Report Trigger',
        'trigger_condition' => 'Keyword: "MISSING" in User Feedback OR Incident Type: "Missing Person"',
        'alert_template_id' => 'TEMPLATE-MISSING-PERSON',
        'status' => 'Inactive',
        'last_triggered' => '2025-07-25 04:30 PM',
        'description' => 'Activates an alert for missing person reports from various sources.'
    ],
    [
        'id' => 'RAT-004',
        'name' => 'High Wind Warning Trigger',
        'trigger_condition' => 'DataFeed: "Weather API", WindSpeed: > 60 km/h',
        'alert_template_id' => 'TEMPLATE-WIND-WARNING',
        'status' => 'Active',
        'last_triggered' => '2025-07-27 09:10 PM',
        'description' => 'Triggers a high wind warning based on external weather data.'
    ]
];

// Sample options for dropdowns
$triggerStatuses = ['All', 'Active', 'Inactive'];
$alertTemplateIds = ['All', 'TEMPLATE-FLOOD-URGENT', 'TEMPLATE-EQ-SEVERE', 'TEMPLATE-MISSING-PERSON', 'TEMPLATE-WIND-WARNING', 'TEMPLATE-GENERAL-INFO', 'Other'];
?>

<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Real-time Alert Trigger</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Automate Alert Generation from Real-time Data</h2>
        <p class="text-gray-700 leading-relaxed">
            The Real-time Alert Trigger module enables administrators to define conditions that automatically generate and dispatch alerts based on incoming data streams, sensor readings, or system events. This ensures immediate response to critical situations without manual intervention.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Configured Alert Triggers</h2>

        <div class="mb-6 flex justify-between items-center">
            <!-- Filter Controls -->
            <div class="flex space-x-4">
                <div>
                    <label for="filterStatus" class="block text-sm font-medium text-gray-700">Filter by Status:</label>
                    <select id="filterStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($triggerStatuses as $status) : ?>
                            <option value="<?php echo htmlspecialchars($status); ?>"><?php echo htmlspecialchars($status); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="filterTemplate" class="block text-sm font-medium text-gray-700">Filter by Alert Template:</label>
                    <select id="filterTemplate" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($alertTemplateIds as $templateId) : ?>
                            <option value="<?php echo htmlspecialchars($templateId); ?>"><?php echo htmlspecialchars($templateId); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button onclick="openTriggerConfigModal('new')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Add New Trigger
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Trigger Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Trigger Condition</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Alert Template</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Last Triggered</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="triggerTableBody">
                    <!-- Alert triggers will be rendered here by JavaScript -->
                    <?php if (empty($alertTriggers)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No alert triggers configured.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Custom Modals (re-using pattern) -->
    <!-- Trigger Configuration Modal (Add/Edit) -->
    <div id="triggerConfigModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4" id="triggerConfigModalTitle">Add New Alert Trigger</h3>
            <form id="triggerConfigForm" onsubmit="return saveTrigger(event)">
                <input type="hidden" id="triggerId">
                <div class="mb-4">
                    <label for="triggerName" class="block text-sm font-medium text-gray-700">Trigger Name</label>
                    <input type="text" id="triggerName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="triggerCondition" class="block text-sm font-medium text-gray-700">Trigger Condition</label>
                    <textarea id="triggerCondition" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="e.g., DataFeed: 'SensorX', Value: > 100" required></textarea>
                    <p class="mt-1 text-xs text-gray-500">Define the conditions for this alert to trigger.</p>
                </div>
                <div class="mb-4">
                    <label for="alertTemplateId" class="block text-sm font-medium text-gray-700">Alert Template ID</label>
                    <select id="alertTemplateId" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <?php foreach (array_slice($alertTemplateIds, 1) as $templateId) : // Exclude 'All' ?>
                            <option value="<?php echo htmlspecialchars($templateId); ?>"><?php echo htmlspecialchars($templateId); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="triggerDescription" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                    <textarea id="triggerDescription" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Brief description of this alert trigger"></textarea>
                </div>
                <div class="mb-4">
                    <label for="triggerStatus" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="triggerStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeTriggerConfigModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Save Trigger
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Trigger Details Modal -->
    <div id="triggerDetailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">Alert Trigger Details</h3>
            <div class="space-y-3 text-gray-700">
                <p><strong>ID:</strong> <span id="modalTriggerId"></span></p>
                <p><strong>Name:</strong> <span id="modalTriggerName"></span></p>
                <p><strong>Trigger Condition:</strong> <span id="modalTriggerCondition"></span></p>
                <p><strong>Alert Template ID:</strong> <span id="modalAlertTemplateId"></span></p>
                <p><strong>Status:</strong> <span id="modalTriggerStatus"></span></p>
                <p><strong>Last Triggered:</strong> <span id="modalLastTriggered"></span></p>
                <p><strong>Description:</strong></p>
                <div id="modalTriggerDescription" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
            </div>
            <div class="mt-6 text-right">
                <button id="closeTriggerDetailsModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
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
    // Initial alert triggers data from PHP
    let alertTriggersData = <?php echo json_encode($alertTriggers); ?>;

    // Get references to DOM elements
    const triggerTableBody = document.getElementById('triggerTableBody');
    const filterStatusSelect = document.getElementById('filterStatus');
    const filterTemplateSelect = document.getElementById('filterTemplate');

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
     * Renders the alert triggers table based on the provided data.
     * @param {Array} dataToRender - The array of trigger objects to display.
     */
    function renderTriggerTable(dataToRender) {
        triggerTableBody.innerHTML = ''; // Clear existing rows

        if (dataToRender.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `<td colspan="7" class="px-6 py-4 text-center text-gray-500">No alert triggers configured.</td>`;
            triggerTableBody.appendChild(noDataRow);
            return;
        }

        dataToRender.forEach(trigger => {
            const row = document.createElement('tr');
            row.classList.add('hover:bg-gray-50');

            // Determine status badge color
            let statusClass = '';
            if (trigger.status === 'Active') statusClass = 'bg-green-100 text-green-800';
            else if (trigger.status === 'Inactive') statusClass = 'bg-red-100 text-red-800';
            else statusClass = 'bg-gray-100 text-gray-800'; // Default

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${trigger.id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${trigger.name}</td>
                <td class="px-6 py-4 text-sm text-gray-700 truncate max-w-xs">${trigger.trigger_condition}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${trigger.alert_template_id}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                        ${trigger.status}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${trigger.last_triggered || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="viewTriggerDetails('${encodeURIComponent(JSON.stringify(trigger))}')" class="text-indigo-600 hover:text-indigo-900 mr-4">View</button>
                    <button onclick="openTriggerConfigModal('edit', '${encodeURIComponent(JSON.stringify(trigger))}')" class="text-blue-600 hover:text-blue-900 mr-4">Edit</button>
                    <button onclick="testTrigger('${trigger.id}')" class="text-yellow-600 hover:text-yellow-900 mr-4">Test</button>
                    <button onclick="deleteTrigger('${trigger.id}')" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
            `;
            triggerTableBody.appendChild(row);
        });
    }

    /**
     * Filters the alert triggers data based on selected criteria and re-renders the table.
     */
    function filterTriggers() {
        const selectedStatus = filterStatusSelect.value;
        const selectedTemplate = filterTemplateSelect.value;

        const filteredData = alertTriggersData.filter(trigger => {
            const matchesStatus = selectedStatus === 'All' || trigger.status === selectedStatus;
            const matchesTemplate = selectedTemplate === 'All' || trigger.alert_template_id === selectedTemplate;
            return matchesStatus && matchesTemplate;
        });

        renderTriggerTable(filteredData);
    }

    // Event listeners for filter changes
    filterStatusSelect.addEventListener('change', filterTriggers);
    filterTemplateSelect.addEventListener('change', filterTriggers);

    // Initial render of the table when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        renderTriggerTable(alertTriggersData);

        // Get elements for Trigger Config Modal
        const triggerConfigModal = document.getElementById('triggerConfigModal');
        const triggerConfigModalTitle = document.getElementById('triggerConfigModalTitle');
        const triggerIdField = document.getElementById('triggerId');
        const triggerNameField = document.getElementById('triggerName');
        const triggerConditionField = document.getElementById('triggerCondition');
        const alertTemplateIdField = document.getElementById('alertTemplateId');
        const triggerDescriptionField = document.getElementById('triggerDescription');
        const triggerStatusField = document.getElementById('triggerStatus');

        /**
         * Opens the trigger configuration modal for adding new or editing existing triggers.
         * @param {string} mode - 'new' or 'edit'.
         * @param {string} [triggerJson=null] - JSON string of the trigger data if in 'edit' mode.
         */
        window.openTriggerConfigModal = function(mode, triggerJson = null) {
            triggerConfigModal.classList.remove('hidden');
            if (mode === 'new') {
                triggerConfigModalTitle.textContent = 'Add New Alert Trigger';
                triggerIdField.value = '';
                triggerNameField.value = '';
                triggerConditionField.value = '';
                alertTemplateIdField.value = 'TEMPLATE-FLOOD-URGENT'; // Default
                triggerDescriptionField.value = '';
                triggerStatusField.value = 'Active';
            } else if (mode === 'edit' && triggerJson) {
                const trigger = JSON.parse(decodeURIComponent(triggerJson));
                triggerConfigModalTitle.textContent = 'Edit Alert Trigger';
                triggerIdField.value = trigger.id;
                triggerNameField.value = trigger.name;
                triggerConditionField.value = trigger.trigger_condition;
                alertTemplateIdField.value = trigger.alert_template_id;
                triggerDescriptionField.value = trigger.description;
                triggerStatusField.value = trigger.status;
            }
        };

        /**
         * Closes the trigger configuration modal.
         */
        window.closeTriggerConfigModal = function() {
            triggerConfigModal.classList.add('hidden');
        };

        /**
         * Handles saving (adding or updating) an alert trigger.
         * @param {Event} event - The form submission event.
         */
        window.saveTrigger = function(event) {
            event.preventDefault(); // Prevent default form submission

            const id = triggerIdField.value;
            const name = triggerNameField.value.trim();
            const trigger_condition = triggerConditionField.value.trim();
            const alert_template_id = alertTemplateIdField.value;
            const description = triggerDescriptionField.value.trim();
            const status = triggerStatusField.value;

            if (!name || !trigger_condition || !alert_template_id) {
                showAlert('Please fill in all required fields (Trigger Name, Trigger Condition, Alert Template ID).', 'Input Error');
                return false;
            }

            const now = new Date();
            const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;

            const newTrigger = {
                id: id || 'RAT-' + (alertTriggersData.length + 1).toString().padStart(3, '0'), // Simple ID generation
                name: name,
                trigger_condition: trigger_condition,
                alert_template_id: alert_template_id,
                status: status,
                last_triggered: 'N/A', // Reset last triggered for new/updated triggers
                description: description
            };

            if (id) {
                // Update existing
                const index = alertTriggersData.findIndex(t => t.id === id);
                if (index !== -1) {
                    // Preserve last_triggered if not specifically reset
                    newTrigger.last_triggered = alertTriggersData[index].last_triggered;
                    alertTriggersData[index] = newTrigger;
                    showAlert(`Alert Trigger "${name}" updated successfully!`, 'Success');
                }
            } else {
                // Add new
                alertTriggersData.push(newTrigger);
                showAlert(`Alert Trigger "${name}" added successfully!`, 'Success');
            }

            closeTriggerConfigModal();
            filterTriggers(); // Re-render table with updated data
            return false; // Prevent actual form submission
        };

        /**
         * Opens the trigger details modal with the given trigger's data.
         * @param {string} triggerJson - JSON string of the trigger entry.
         */
        window.viewTriggerDetails = function(triggerJson) {
            const trigger = JSON.parse(decodeURIComponent(triggerJson));
            document.getElementById('modalTriggerId').textContent = trigger.id;
            document.getElementById('modalTriggerName').textContent = trigger.name;
            document.getElementById('modalTriggerCondition').textContent = trigger.trigger_condition;
            document.getElementById('modalAlertTemplateId').textContent = trigger.alert_template_id;
            document.getElementById('modalTriggerStatus').textContent = trigger.status;
            document.getElementById('modalLastTriggered').textContent = trigger.last_triggered || 'N/A';
            document.getElementById('modalTriggerDescription').textContent = trigger.description || 'No description provided.';

            document.getElementById('triggerDetailsModal').classList.remove('hidden');
        };

        // Close trigger details modal
        document.getElementById('closeTriggerDetailsModal').addEventListener('click', function() {
            document.getElementById('triggerDetailsModal').classList.add('hidden');
        });

        /**
         * Simulates testing an alert trigger.
         * In a real app, this would involve simulating the condition and checking if the alert is generated.
         * @param {string} id - The ID of the trigger to test.
         */
        window.testTrigger = function(id) {
            showConfirm(`Are you sure you want to test alert trigger ${id}? This will simulate its condition being met.`, (confirmed) => {
                if (confirmed) {
                    showAlert(`Simulating test for trigger ${id}... (Check console for simulated alert generation)`, 'Testing Trigger');
                    const index = alertTriggersData.findIndex(t => t.id === id);
                    if (index !== -1) {
                        // Simulate trigger success/failure
                        const isTriggered = Math.random() > 0.15; // 85% chance of triggering
                        const now = new Date();
                        const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;
                        alertTriggersData[index].last_triggered = timestamp;

                        if (isTriggered) {
                            console.log(`Trigger ${id} Test Result: SUCCESS! Alert generated using template ${alertTriggersData[index].alert_template_id}.`);
                            showAlert(`Trigger ${id} successfully generated an alert!`, 'Test Result');
                        } else {
                            console.error(`Trigger ${id} Test Result: FAILED! Condition not met or error in processing.`);
                            showAlert(`Trigger ${id} did not generate an alert. Check conditions.`, 'Test Result (Failed)');
                        }
                        filterTriggers(); // Re-render table to show updated last_triggered timestamp
                    }
                }
            }, 'Test Alert Trigger');
        };

        /**
         * Deletes an alert trigger.
         * @param {string} id - The ID of the trigger to delete.
         */
        window.deleteTrigger = function(id) {
            showConfirm(`Are you sure you want to delete alert trigger ${id}? This action cannot be undone.`, (confirmed) => {
                if (confirmed) {
                    alertTriggersData = alertTriggersData.filter(t => t.id !== id);
                    showAlert(`Alert trigger ${id} deleted successfully.`, 'Trigger Deleted');
                    filterTriggers(); // Re-render table
                }
            }, 'Delete Alert Trigger');
        };
    });
</script>
