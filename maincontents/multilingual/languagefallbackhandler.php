<?php
// --- PHP PLACEHOLDER LOGIC ---
// This section simulates backend data for language fallback rules.
// In a real application, this data would be fetched from a database.
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample language fallback rules data
$languageFallbackRules = [
    [
        'id' => 'LFH-001',
        'name' => 'Filipino to English Fallback',
        'primary_lang' => 'Filipino',
        'fallback_lang' => 'English',
        'trigger_condition' => 'Recipient preference is Filipino, but content not available.',
        'status' => 'Active',
        'last_used' => '2025-07-28 01:00 PM',
        'description' => 'If a recipient prefers Filipino but the message is only in English, send the English version.'
    ],
    [
        'id' => 'LFH-002',
        'name' => 'Cebuano to Filipino Fallback',
        'primary_lang' => 'Cebuano',
        'fallback_lang' => 'Filipino',
        'trigger_condition' => 'Recipient preference is Cebuano, but content not available.',
        'status' => 'Active',
        'last_used' => '2025-07-28 12:45 PM',
        'description' => 'For Cebuano speakers, if Cebuano content is missing, fall back to Filipino.'
    ],
    [
        'id' => 'LFH-003',
        'name' => 'Any to English Default',
        'primary_lang' => 'Any (Undefined)',
        'fallback_lang' => 'English',
        'trigger_condition' => 'Recipient language preference is unknown or unsupported.',
        'status' => 'Active',
        'last_used' => '2025-07-28 12:00 PM',
        'description' => 'As a last resort, if no specific language can be determined or supported, default to English.'
    ],
    [
        'id' => 'LFH-004',
        'name' => 'Ilokano to English Fallback (Inactive)',
        'primary_lang' => 'Ilokano',
        'fallback_lang' => 'English',
        'trigger_condition' => 'Ilokano content missing for Ilokano speakers.',
        'status' => 'Inactive',
        'last_used' => 'N/A',
        'description' => 'Inactive rule to fall back from Ilokano to English if content is not available.'
    ]
];

// Sample options for dropdowns (should align with languages in Language Preference Manager)
$languages = ['English', 'Filipino', 'Cebuano', 'Ilokano', 'Japanese', 'Spanish', 'Other', 'Any (Undefined)'];
$ruleStatuses = ['All', 'Active', 'Inactive'];
?>

<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Language Fallback Handler</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Define Rules for Language Availability</h2>
        <p class="text-gray-700 leading-relaxed">
            The Language Fallback Handler ensures that communications are always delivered, even if preferred language content is not available. Administrators can define a hierarchy of fallback languages, allowing the system to automatically switch to an alternative language if the primary one cannot be used for a specific message or recipient.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Configured Fallback Rules</h2>

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
                    <label for="filterPrimaryLang" class="block text-sm font-medium text-gray-700">Filter by Primary Language:</label>
                    <select id="filterPrimaryLang" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="All">All</option>
                        <?php foreach ($languages as $lang) : ?>
                            <option value="<?php echo htmlspecialchars($lang); ?>"><?php echo htmlspecialchars($lang); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="filterFallbackLang" class="block text-sm font-medium text-gray-700">Filter by Fallback Language:</label>
                    <select id="filterFallbackLang" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="All">All</option>
                        <?php foreach ($languages as $lang) : ?>
                            <option value="<?php echo htmlspecialchars($lang); ?>"><?php echo htmlspecialchars($lang); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button onclick="openConfigModal('new')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Primary Lang</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Fallback Lang</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Last Used</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="ruleTableBody">
                    <!-- Rules will be rendered here by JavaScript -->
                    <?php if (empty($languageFallbackRules)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No language fallback rules configured.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Custom Modals -->
    <!-- Rule Configuration Modal (Add/Edit) -->
    <div id="configModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4" id="configModalTitle">Add New Fallback Rule</h3>
            <form id="configForm" onsubmit="return saveRule(event)">
                <input type="hidden" id="ruleId">
                <div class="mb-4">
                    <label for="ruleName" class="block text-sm font-medium text-gray-700">Rule Name</label>
                    <input type="text" id="ruleName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="primaryLang" class="block text-sm font-medium text-gray-700">Primary Language</label>
                    <select id="primaryLang" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <?php foreach ($languages as $lang) : ?>
                            <option value="<?php echo htmlspecialchars($lang); ?>"><?php echo htmlspecialchars($lang); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="fallbackLang" class="block text-sm font-medium text-gray-700">Fallback Language</label>
                    <select id="fallbackLang" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <?php foreach ($languages as $lang) : ?>
                            <option value="<?php echo htmlspecialchars($lang); ?>"><?php echo htmlspecialchars($lang); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="triggerCondition" class="block text-sm font-medium text-gray-700">Trigger Condition</label>
                    <textarea id="triggerCondition" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="e.g., Recipient preference is Filipino, but content not available." required></textarea>
                    <p class="mt-1 text-xs text-gray-500">Define when this fallback rule should activate.</p>
                </div>
                <div class="mb-4">
                    <label for="ruleDescription" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                    <textarea id="ruleDescription" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Brief description of this fallback rule"></textarea>
                </div>
                <div class="mb-4">
                    <label for="ruleStatus" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="ruleStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeConfigModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
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
    <div id="detailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">Language Fallback Rule Details</h3>
            <div class="space-y-3 text-gray-700">
                <p><strong>ID:</strong> <span id="modalRuleId"></span></p>
                <p><strong>Name:</strong> <span id="modalRuleName"></span></p>
                <p><strong>Primary Language:</strong> <span id="modalPrimaryLang"></span></p>
                <p><strong>Fallback Language:</strong> <span id="modalFallbackLang"></span></p>
                <p><strong>Trigger Condition:</strong> <span id="modalTriggerCondition"></span></p>
                <p><strong>Status:</strong> <span id="modalRuleStatus"></span></p>
                <p><strong>Last Used:</strong> <span id="modalLastUsed"></span></p>
                <p><strong>Description:</strong></p>
                <div id="modalRuleDescription" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
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
    // Initial language fallback rules data from PHP
    let languageFallbackRulesData = <?php echo json_encode($languageFallbackRules); ?>;

    // Get references to DOM elements
    const ruleTableBody = document.getElementById('ruleTableBody');
    const filterStatusSelect = document.getElementById('filterStatus');
    const filterPrimaryLangSelect = document.getElementById('filterPrimaryLang');
    const filterFallbackLangSelect = document.getElementById('filterFallbackLang');

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
     * Renders the language fallback rules table based on the provided data.
     * @param {Array} dataToRender - The array of rule objects to display.
     */
    function renderRuleTable(dataToRender) {
        ruleTableBody.innerHTML = ''; // Clear existing rows

        if (dataToRender.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `<td colspan="7" class="px-6 py-4 text-center text-gray-500">No language fallback rules configured.</td>`;
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
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${rule.primary_lang}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${rule.fallback_lang}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                        ${rule.status}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${rule.last_used || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="viewDetails('${encodeURIComponent(JSON.stringify(rule))}')" class="text-indigo-600 hover:text-indigo-900 mr-4">View</button>
                    <button onclick="openConfigModal('edit', '${encodeURIComponent(JSON.stringify(rule))}')" class="text-blue-600 hover:text-blue-900 mr-4">Edit</button>
                    <button onclick="testRule('${rule.id}')" class="text-yellow-600 hover:text-yellow-900 mr-4">Test</button>
                    <button onclick="deleteRule('${rule.id}')" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
            `;
            ruleTableBody.appendChild(row);
        });
    }

    /**
     * Filters the language fallback rules data based on selected criteria and re-renders the table.
     */
    function filterRules() {
        const selectedStatus = filterStatusSelect.value;
        const selectedPrimaryLang = filterPrimaryLangSelect.value;
        const selectedFallbackLang = filterFallbackLangSelect.value;

        const filteredData = languageFallbackRulesData.filter(rule => {
            const matchesStatus = selectedStatus === 'All' || rule.status === selectedStatus;
            const matchesPrimaryLang = selectedPrimaryLang === 'All' || rule.primary_lang === selectedPrimaryLang;
            const matchesFallbackLang = selectedFallbackLang === 'All' || rule.fallback_lang === selectedFallbackLang;
            return matchesStatus && matchesPrimaryLang && matchesFallbackLang;
        });

        renderRuleTable(filteredData);
    }

    // Event listeners for filter changes
    filterStatusSelect.addEventListener('change', filterRules);
    filterPrimaryLangSelect.addEventListener('change', filterRules);
    filterFallbackLangSelect.addEventListener('change', filterRules);

    // Initial render of the table when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        renderRuleTable(languageFallbackRulesData);

        // Get elements for Rule Config Modal
        const configModal = document.getElementById('configModal');
        const configModalTitle = document.getElementById('configModalTitle');
        const ruleIdField = document.getElementById('ruleId');
        const ruleNameField = document.getElementById('ruleName');
        const primaryLangField = document.getElementById('primaryLang');
        const fallbackLangField = document.getElementById('fallbackLang');
        const triggerConditionField = document.getElementById('triggerCondition');
        const ruleDescriptionField = document.getElementById('ruleDescription');
        const ruleStatusField = document.getElementById('ruleStatus');

        /**
         * Opens the rule configuration modal for adding new or editing existing rules.
         * @param {string} mode - 'new' or 'edit'.
         * @param {string} [ruleJson=null] - JSON string of the rule data if in 'edit' mode.
         */
        window.openConfigModal = function(mode, ruleJson = null) {
            configModal.classList.remove('hidden');
            if (mode === 'new') {
                configModalTitle.textContent = 'Add New Fallback Rule';
                ruleIdField.value = '';
                ruleNameField.value = '';
                primaryLangField.value = 'Filipino'; // Default
                fallbackLangField.value = 'English'; // Default
                triggerConditionField.value = '';
                ruleDescriptionField.value = '';
                ruleStatusField.value = 'Active';
            } else if (mode === 'edit' && ruleJson) {
                const rule = JSON.parse(decodeURIComponent(ruleJson));
                configModalTitle.textContent = 'Edit Fallback Rule';
                ruleIdField.value = rule.id;
                ruleNameField.value = rule.name;
                primaryLangField.value = rule.primary_lang;
                fallbackLangField.value = rule.fallback_lang;
                triggerConditionField.value = rule.trigger_condition;
                ruleDescriptionField.value = rule.description;
                ruleStatusField.value = rule.status;
            }
        };

        /**
         * Closes the rule configuration modal.
         */
        window.closeConfigModal = function() {
            configModal.classList.add('hidden');
        };

        /**
         * Handles saving (adding or updating) a language fallback rule.
         * @param {Event} event - The form submission event.
         */
        window.saveRule = function(event) {
            event.preventDefault(); // Prevent default form submission

            const id = ruleIdField.value;
            const name = ruleNameField.value.trim();
            const primary_lang = primaryLangField.value;
            const fallback_lang = fallbackLangField.value;
            const trigger_condition = triggerConditionField.value.trim();
            const description = ruleDescriptionField.value.trim();
            const status = ruleStatusField.value;

            if (!name || !primary_lang || !fallback_lang || !trigger_condition) {
                showAlert('Please fill in all required fields (Rule Name, Primary Language, Fallback Language, Trigger Condition).', 'Input Error');
                return false;
            }
            if (primary_lang === fallback_lang) {
                showAlert('Primary and Fallback languages cannot be the same.', 'Input Error');
                return false;
            }

            const now = new Date();
            const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;

            const newRule = {
                id: id || 'LFH-' + (languageFallbackRulesData.length + 1).toString().padStart(3, '0'), // Simple ID generation
                name: name,
                primary_lang: primary_lang,
                fallback_lang: fallback_lang,
                trigger_condition: trigger_condition,
                status: status,
                last_used: timestamp,
                description: description
            };

            if (id) {
                // Update existing
                const index = languageFallbackRulesData.findIndex(rule => rule.id === id);
                if (index !== -1) {
                    // Preserve last_used if not explicitly changed
                    newRule.last_used = languageFallbackRulesData[index].last_used;
                    languageFallbackRulesData[index] = newRule;
                    showAlert(`Language Fallback Rule "${name}" updated successfully!`, 'Success');
                }
            } else {
                // Add new
                languageFallbackRulesData.push(newRule);
                showAlert(`Language Fallback Rule "${name}" added successfully!`, 'Success');
            }

            closeConfigModal();
            filterRules(); // Re-render table with updated data
            return false; // Prevent actual form submission
        };

        /**
         * Opens the rule details modal with the given rule's data.
         * @param {string} ruleJson - JSON string of the rule entry.
         */
        window.viewDetails = function(ruleJson) {
            const rule = JSON.parse(decodeURIComponent(ruleJson));
            document.getElementById('modalRuleId').textContent = rule.id;
            document.getElementById('modalRuleName').textContent = rule.name;
            document.getElementById('modalPrimaryLang').textContent = rule.primary_lang;
            document.getElementById('modalFallbackLang').textContent = rule.fallback_lang;
            document.getElementById('modalTriggerCondition').textContent = rule.trigger_condition;
            document.getElementById('modalRuleStatus').textContent = rule.status;
            document.getElementById('modalLastUsed').textContent = rule.last_used || 'N/A';
            document.getElementById('modalRuleDescription').textContent = rule.description || 'No description provided.';

            document.getElementById('detailsModal').classList.remove('hidden');
        };

        // Close rule details modal
        document.getElementById('closeDetailsModal').addEventListener('click', function() {
            document.getElementById('detailsModal').classList.add('hidden');
        });

        /**
         * Simulates testing a language fallback rule.
         * In a real app, this would involve simulating a content request in the primary language and checking if fallback occurs.
         * @param {string} id - The ID of the rule to test.
         */
        window.testRule = function(id) {
            showConfirm(`Are you sure you want to test language fallback rule ${id}? This will simulate content unavailability.`, (confirmed) => {
                if (confirmed) {
                    showAlert(`Simulating test for rule ${id}... (Check console for simulated fallback)`, 'Testing Rule');
                    const index = languageFallbackRulesData.findIndex(rule => rule.id === id);
                    if (index !== -1) {
                        const rule = languageFallbackRulesData[index];
                        // Simulate rule application success/failure
                        const isFallbackTriggered = Math.random() > 0.1; // 90% chance of triggering fallback
                        const now = new Date();
                        const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;
                        rule.last_used = timestamp;

                        if (isFallbackTriggered) {
                            console.log(`Rule ${id} Test Result: SUCCESS! Primary language content unavailable. Fallback to ${rule.fallback_lang} occurred.`);
                            showAlert(`Rule ${id} tested successfully! Fallback to ${rule.fallback_lang} was triggered.`, 'Test Result');
                        } else {
                            console.error(`Rule ${id} Test Result: FAILED! Primary language content was unexpectedly available or fallback logic failed.`);
                            showAlert(`Rule ${id} did not trigger fallback. Check conditions.`, 'Test Result (Failed)');
                        }
                        filterRules(); // Re-render table to show updated last_used timestamp
                    }
                }
            }, 'Test Language Fallback Rule');
        };

        /**
         * Deletes a language fallback rule.
         * @param {string} id - The ID of the rule to delete.
         */
        window.deleteRule = function(id) {
            showConfirm(`Are you sure you want to delete language fallback rule ${id}? This action cannot be undone.`, (confirmed) => {
                if (confirmed) {
                    languageFallbackRulesData = languageFallbackRulesData.filter(rule => rule.id !== id);
                    showAlert(`Language fallback rule ${id} deleted successfully.`, 'Rule Deleted');
                    filterRules(); // Re-render table
                }
            }, 'Delete Language Fallback Rule');
        };
    });
</script>
