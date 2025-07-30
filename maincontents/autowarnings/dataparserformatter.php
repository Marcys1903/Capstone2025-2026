<?php
// --- PHP PLACEHOLDER LOGIC ---
// This section simulates backend data for data parsing and formatting rules.
// In a real application, this data would be fetched from a database.
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample data parsing and formatting rules
$parsingRules = [
    [
        'id' => 'DPF-001',
        'name' => 'SMS Keyword Extractor',
        'source_format' => 'SMS Text',
        'target_format' => 'JSON',
        'status' => 'Active',
        'last_used' => '2025-07-27 09:00 AM',
        'description' => 'Extracts keywords like "SAFE", "HELP" from incoming SMS messages and formats into JSON.',
        'config_details' => '{"keywords": ["SAFE", "HELP", "TRAPPED"], "output_fields": ["status", "keywords"]}'
    ],
    [
        'id' => 'DPF-002',
        'name' => 'Weather API XML to JSON',
        'source_format' => 'XML',
        'target_format' => 'JSON',
        'status' => 'Inactive',
        'last_used' => '2025-07-20 03:15 PM',
        'description' => 'Converts weather data received in XML format from external APIs into a standardized JSON structure.',
        'config_details' => '{"xml_path": "/weather/current", "json_map": {"temp": "temperature", "cond": "condition"}}'
    ],
    [
        'id' => 'DPF-003',
        'name' => 'Incident Report Parser',
        'source_format' => 'Free-form Text',
        'target_format' => 'Structured Record',
        'status' => 'Active',
        'last_used' => '2025-07-26 11:45 AM',
        'description' => 'Parses unstructured incident descriptions into structured fields like incident type, location, and severity.',
        'config_details' => '{"nlp_model_id": "INC_CLASSIFIER_V1", "confidence_threshold": 0.7}'
    ]
];

// Sample options for dropdowns
$sourceFormats = ['All', 'SMS Text', 'Email Body', 'XML', 'JSON', 'CSV', 'Free-form Text', 'Other'];
$targetFormats = ['All', 'JSON', 'XML', 'CSV', 'Structured Record', 'Plain Text', 'Other'];
$ruleStatuses = ['All', 'Active', 'Inactive'];
?>

<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Data Parser & Formatter Module</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Configure Data Transformation Rules</h2>
        <p class="text-gray-700 leading-relaxed">
            The Data Parser & Formatter Module enables administrators to define rules for transforming incoming and outgoing data between various formats. This ensures compatibility and consistency across different integrated systems and communication channels, from parsing unstructured text to converting between structured data formats.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Configured Data Parsing Rules</h2>

        <div class="mb-6 flex justify-between items-center">
            <!-- Filter Controls -->
            <div class="flex space-x-4">
                <div>
                    <label for="filterStatus" class="block text-sm font-medium text-gray-700">Filter by Status:</label>
                    <select id="filterStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($ruleStatuses as $status) : ?>
                            <option value="<?php echo htmlspecialchars($status); ?>"><?php echo htmlspecialchars($status); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="filterSourceFormat" class="block text-sm font-medium text-gray-700">Filter by Source Format:</label>
                    <select id="filterSourceFormat" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($sourceFormats as $format) : ?>
                            <option value="<?php echo htmlspecialchars($format); ?>"><?php echo htmlspecialchars($format); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="filterTargetFormat" class="block text-sm font-medium text-gray-700">Filter by Target Format:</label>
                    <select id="filterTargetFormat" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($targetFormats as $format) : ?>
                            <option value="<?php echo htmlspecialchars($format); ?>"><?php echo htmlspecialchars($format); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button onclick="openRuleConfigModal('new')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Add New Rule
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Rule Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Source Format</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Target Format</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Last Used</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="ruleTableBody">
                    <!-- Rules will be rendered here by JavaScript -->
                    <?php if (empty($parsingRules)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No data parsing rules configured.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Custom Modals (re-using pattern) -->
    <!-- Rule Configuration Modal (Add/Edit) -->
    <div id="ruleConfigModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4" id="ruleConfigModalTitle">Add New Parsing Rule</h3>
            <form id="ruleConfigForm" onsubmit="return saveRule(event)">
                <input type="hidden" id="ruleId">
                <div class="mb-4">
                    <label for="ruleName" class="block text-sm font-medium text-gray-700">Rule Name</label>
                    <input type="text" id="ruleName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="sourceFormat" class="block text-sm font-medium text-gray-700">Source Format</label>
                    <select id="sourceFormat" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <?php foreach (array_slice($sourceFormats, 1) as $format) : // Exclude 'All' ?>
                            <option value="<?php echo htmlspecialchars($format); ?>"><?php echo htmlspecialchars($format); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="targetFormat" class="block text-sm font-medium text-gray-700">Target Format</label>
                    <select id="targetFormat" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <?php foreach (array_slice($targetFormats, 1) as $format) : // Exclude 'All' ?>
                            <option value="<?php echo htmlspecialchars($format); ?>"><?php echo htmlspecialchars($format); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="ruleDescription" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                    <textarea id="ruleDescription" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Brief description of this parsing rule"></textarea>
                </div>
                <div class="mb-4">
                    <label for="configDetails" class="block text-sm font-medium text-gray-700">Configuration Details (JSON/Text)</label>
                    <textarea id="configDetails" rows="5" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm font-mono" placeholder='e.g., {"key": "value", "another": "setting"}'></textarea>
                    <p class="mt-1 text-xs text-gray-500">Provide rule-specific configuration in JSON or plain text format.</p>
                </div>
                <div class="mb-4">
                    <label for="ruleStatus" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="ruleStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeRuleConfigModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Save Rule
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Rule Details Modal -->
    <div id="ruleDetailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">Parsing Rule Details</h3>
            <div class="space-y-3 text-gray-700">
                <p><strong>ID:</strong> <span id="modalRuleId"></span></p>
                <p><strong>Name:</strong> <span id="modalRuleName"></span></p>
                <p><strong>Source Format:</strong> <span id="modalSourceFormat"></span></p>
                <p><strong>Target Format:</strong> <span id="modalTargetFormat"></span></p>
                <p><strong>Status:</strong> <span id="modalRuleStatus"></span></p>
                <p><strong>Last Used:</strong> <span id="modalLastUsed"></span></p>
                <p><strong>Description:</strong></p>
                <div id="modalRuleDescription" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
                <p><strong>Configuration Details:</strong></p>
                <pre id="modalConfigDetails" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[120px] overflow-auto text-sm font-mono"></pre>
            </div>
            <div class="mt-6 text-right">
                <button id="closeRuleDetailsModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
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
    // Initial data parsing rules data from PHP
    let parsingRulesData = <?php echo json_encode($parsingRules); ?>;

    // Get references to DOM elements
    const ruleTableBody = document.getElementById('ruleTableBody');
    const filterStatusSelect = document.getElementById('filterStatus');
    const filterSourceFormatSelect = document.getElementById('filterSourceFormat');
    const filterTargetFormatSelect = document.getElementById('filterTargetFormat');

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
     * Renders the data parsing rules table based on the provided data.
     * @param {Array} dataToRender - The array of rule objects to display.
     */
    function renderRuleTable(dataToRender) {
        ruleTableBody.innerHTML = ''; // Clear existing rows

        if (dataToRender.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `<td colspan="7" class="px-6 py-4 text-center text-gray-500">No data parsing rules found matching filters.</td>`;
            ruleTableBody.appendChild(noDataRow);
            return;
        }

        dataToRender.forEach(rule => {
            const row = document.createElement('tr');
            row.classList.add('hover:bg-gray-50');

            // Determine status badge color
            let statusClass = '';
            if (rule.status === 'Active') statusClass = 'bg-green-100 text-green-800';
            else if (rule.status === 'Inactive') statusClass = 'bg-red-100 text-red-800';
            else statusClass = 'bg-gray-100 text-gray-800'; // Default

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${rule.id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${rule.name}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${rule.source_format}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${rule.target_format}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                        ${rule.status}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${rule.last_used || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="viewRuleDetails('${encodeURIComponent(JSON.stringify(rule))}')" class="text-indigo-600 hover:text-indigo-900 mr-4">View</button>
                    <button onclick="openRuleConfigModal('edit', '${encodeURIComponent(JSON.stringify(rule))}')" class="text-blue-600 hover:text-blue-900 mr-4">Edit</button>
                    <button onclick="testRule('${rule.id}')" class="text-yellow-600 hover:text-yellow-900 mr-4">Test</button>
                    <button onclick="deleteRule('${rule.id}')" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
            `;
            ruleTableBody.appendChild(row);
        });
    }

    /**
     * Filters the data parsing rules data based on selected criteria and re-renders the table.
     */
    function filterRules() {
        const selectedStatus = filterStatusSelect.value;
        const selectedSourceFormat = filterSourceFormatSelect.value;
        const selectedTargetFormat = filterTargetFormatSelect.value;

        const filteredData = parsingRulesData.filter(rule => {
            const matchesStatus = selectedStatus === 'All' || rule.status === selectedStatus;
            const matchesSourceFormat = selectedSourceFormat === 'All' || rule.source_format === selectedSourceFormat;
            const matchesTargetFormat = selectedTargetFormat === 'All' || rule.target_format === selectedTargetFormat;
            return matchesStatus && matchesSourceFormat && matchesTargetFormat;
        });

        renderRuleTable(filteredData);
    }

    // Event listeners for filter changes
    filterStatusSelect.addEventListener('change', filterRules);
    filterSourceFormatSelect.addEventListener('change', filterRules);
    filterTargetFormatSelect.addEventListener('change', filterRules);

    // Initial render of the table when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        renderRuleTable(parsingRulesData);

        // Get elements for Rule Config Modal
        const ruleConfigModal = document.getElementById('ruleConfigModal');
        const ruleConfigModalTitle = document.getElementById('ruleConfigModalTitle');
        const ruleIdField = document.getElementById('ruleId');
        const ruleNameField = document.getElementById('ruleName');
        const sourceFormatField = document.getElementById('sourceFormat');
        const targetFormatField = document.getElementById('targetFormat');
        const ruleDescriptionField = document.getElementById('ruleDescription');
        const configDetailsField = document.getElementById('configDetails');
        const ruleStatusField = document.getElementById('ruleStatus');

        /**
         * Opens the rule configuration modal for adding new or editing existing rules.
         * @param {string} mode - 'new' or 'edit'.
         * @param {string} [ruleJson=null] - JSON string of the rule data if in 'edit' mode.
         */
        window.openRuleConfigModal = function(mode, ruleJson = null) {
            ruleConfigModal.classList.remove('hidden');
            if (mode === 'new') {
                ruleConfigModalTitle.textContent = 'Add New Parsing Rule';
                ruleIdField.value = '';
                ruleNameField.value = '';
                sourceFormatField.value = 'SMS Text'; // Default
                targetFormatField.value = 'JSON'; // Default
                ruleDescriptionField.value = '';
                configDetailsField.value = '';
                ruleStatusField.value = 'Active';
            } else if (mode === 'edit' && ruleJson) {
                const rule = JSON.parse(decodeURIComponent(ruleJson));
                ruleConfigModalTitle.textContent = 'Edit Parsing Rule';
                ruleIdField.value = rule.id;
                ruleNameField.value = rule.name;
                sourceFormatField.value = rule.source_format;
                targetFormatField.value = rule.target_format;
                ruleDescriptionField.value = rule.description;
                configDetailsField.value = rule.config_details;
                ruleStatusField.value = rule.status;
            }
        };

        /**
         * Closes the rule configuration modal.
         */
        window.closeRuleConfigModal = function() {
            ruleConfigModal.classList.add('hidden');
        };

        /**
         * Handles saving (adding or updating) a parsing rule.
         * @param {Event} event - The form submission event.
         */
        window.saveRule = function(event) {
            event.preventDefault(); // Prevent default form submission

            const id = ruleIdField.value;
            const name = ruleNameField.value.trim();
            const source_format = sourceFormatField.value;
            const target_format = targetFormatField.value;
            const description = ruleDescriptionField.value.trim();
            const config_details = configDetailsField.value.trim();
            const status = ruleStatusField.value;

            if (!name || !source_format || !target_format) {
                showAlert('Please fill in all required fields (Rule Name, Source Format, Target Format).', 'Input Error');
                return false;
            }

            const now = new Date();
            const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;

            const newRule = {
                id: id || 'DPF-' + (parsingRulesData.length + 1).toString().padStart(3, '0'), // Simple ID generation
                name: name,
                source_format: source_format,
                target_format: target_format,
                status: status,
                last_used: timestamp,
                description: description,
                config_details: config_details
            };

            if (id) {
                // Update existing
                const index = parsingRulesData.findIndex(rule => rule.id === id);
                if (index !== -1) {
                    parsingRulesData[index] = newRule;
                    showAlert(`Parsing Rule "${name}" updated successfully!`, 'Success');
                }
            } else {
                // Add new
                parsingRulesData.push(newRule);
                showAlert(`Parsing Rule "${name}" added successfully!`, 'Success');
            }

            closeRuleConfigModal();
            filterRules(); // Re-render table with updated data
            return false; // Prevent actual form submission
        };

        /**
         * Opens the rule details modal with the given rule's data.
         * @param {string} ruleJson - JSON string of the rule entry.
         */
        window.viewRuleDetails = function(ruleJson) {
            const rule = JSON.parse(decodeURIComponent(ruleJson));
            document.getElementById('modalRuleId').textContent = rule.id;
            document.getElementById('modalRuleName').textContent = rule.name;
            document.getElementById('modalSourceFormat').textContent = rule.source_format;
            document.getElementById('modalTargetFormat').textContent = rule.target_format;
            document.getElementById('modalRuleStatus').textContent = rule.status;
            document.getElementById('modalLastUsed').textContent = rule.last_used || 'N/A';
            document.getElementById('modalRuleDescription').textContent = rule.description || 'No description provided.';
            document.getElementById('modalConfigDetails').textContent = rule.config_details ? JSON.stringify(JSON.parse(rule.config_details), null, 2) : 'No specific configuration.';

            document.getElementById('ruleDetailsModal').classList.remove('hidden');
        };

        // Close rule details modal
        document.getElementById('closeRuleDetailsModal').addEventListener('click', function() {
            document.getElementById('ruleDetailsModal').classList.add('hidden');
        });

        /**
         * Simulates testing a data parsing rule.
         * In a real app, this would involve sending sample data to a backend endpoint that applies the rule.
         * @param {string} id - The ID of the rule to test.
         */
        window.testRule = function(id) {
            showConfirm(`Are you sure you want to test parsing rule ${id}? This will simulate a data transformation.`, (confirmed) => {
                if (confirmed) {
                    showAlert(`Simulating test for parsing rule ${id}... (Check console for simulated result)`, 'Testing Rule');
                    const index = parsingRulesData.findIndex(rule => rule.id === id);
                    if (index !== -1) {
                        // Simulate rule application success/failure
                        const isSuccess = Math.random() > 0.2; // 80% chance of success
                        const now = new Date();
                        const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;
                        parsingRulesData[index].last_used = timestamp;
                        // Status might change based on test result in a real system, but for simulation, keep current status
                        // parsingRulesData[index].status = isSuccess ? 'Active' : 'Inactive';

                        if (isSuccess) {
                            console.log(`Rule ${id} Test Result: SUCCESS! Sample input transformed to target format.`);
                            console.log(`Simulated Output: { "processed_data": "example_output_from_rule" }`);
                            showAlert(`Parsing rule ${id} tested successfully!`, 'Test Result');
                        } else {
                            console.error(`Rule ${id} Test Result: FAILED! Error: "Parsing error: Invalid input format."`);
                            showAlert(`Parsing rule ${id} test failed! Check configuration.`, 'Test Result (Failed)');
                        }
                        filterRules(); // Re-render table to show updated last_used timestamp
                    }
                }
            }, 'Test Parsing Rule');
        };

        /**
         * Deletes a data parsing rule.
         * @param {string} id - The ID of the rule to delete.
         */
        window.deleteRule = function(id) {
            showConfirm(`Are you sure you want to delete parsing rule ${id}? This action cannot be undone.`, (confirmed) => {
                if (confirmed) {
                    parsingRulesData = parsingRulesData.filter(rule => rule.id !== id);
                    showAlert(`Parsing rule ${id} deleted successfully.`, 'Rule Deleted');
                    filterRules(); // Re-render table
                }
            }, 'Delete Parsing Rule');
        };
    });
</script>
