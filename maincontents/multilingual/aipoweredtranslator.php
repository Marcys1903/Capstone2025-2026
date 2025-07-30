<?php
// --- PHP PLACEHOLDER LOGIC ---
// This section simulates backend data for translation requests.
// In a real application, this data would be fetched from a database.
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample translation history data
$translationHistory = [
    [
        'id' => 'TRN-001',
        'source_text' => 'Hello, how can I help you today?',
        'translated_text' => 'Kumusta, paano ako makakatulong sa iyo ngayon?',
        'source_lang' => 'English',
        'target_lang' => 'Filipino',
        'status' => 'Completed',
        'timestamp' => '2025-07-28 11:00 AM',
        'requested_by' => 'Admin Marcus'
    ],
    [
        'id' => 'TRN-002',
        'source_text' => 'Please evacuate immediately to the nearest shelter.',
        'translated_text' => 'Palihug pagbakwit dayon sa labing duol nga puy-anan.',
        'source_lang' => 'English',
        'target_lang' => 'Cebuano',
        'status' => 'Completed',
        'timestamp' => '2025-07-28 10:45 AM',
        'requested_by' => 'System Auto'
    ],
    [
        'id' => 'TRN-003',
        'source_text' => 'May bagyo po ba sa inyong lugar?',
        'translated_text' => 'Is there a storm in your area?',
        'source_lang' => 'Filipino',
        'target_lang' => 'English',
        'status' => 'Pending',
        'timestamp' => '2025-07-28 10:30 AM',
        'requested_by' => 'User Feedback'
    ],
    [
        'id' => 'TRN-004',
        'source_text' => 'Malakas na pag-ulan ang nararanasan sa hilagang bahagi ng probinsya.',
        'translated_text' => 'Heavy rainfall is being experienced in the northern part of the province.',
        'source_lang' => 'Filipino',
        'target_lang' => 'English',
        'status' => 'Failed',
        'timestamp' => '2025-07-27 03:00 PM',
        'requested_by' => 'Admin Marcus'
    ]
];

// Sample options for dropdowns
$languages = ['English', 'Filipino', 'Cebuano', 'Ilokano', 'Japanese', 'Spanish', 'Other'];
$translationStatuses = ['All', 'Completed', 'Pending', 'Failed'];
?>

<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">AI-Powered Translator</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Translate Content Using AI</h2>
        <p class="text-gray-700 leading-relaxed">
            The AI-Powered Translator module allows administrators to translate text content between various languages instantly. This is crucial for multilingual communication, ensuring that alerts, messages, and reports can be understood by all recipients, regardless of their native language.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">New Translation Request</h2>
        <button onclick="openRequestModal()" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
            Request New Translation
        </button>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Translation History</h2>

        <div class="mb-6 flex space-x-4">
            <div>
                <label for="filterSourceLang" class="block text-sm font-medium text-gray-700">Filter by Source Language:</label>
                <select id="filterSourceLang" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="All">All</option>
                    <?php foreach ($languages as $lang) : ?>
                        <option value="<?php echo htmlspecialchars($lang); ?>"><?php echo htmlspecialchars($lang); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="filterTargetLang" class="block text-sm font-medium text-gray-700">Filter by Target Language:</label>
                <select id="filterTargetLang" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="All">All</option>
                    <?php foreach ($languages as $lang) : ?>
                        <option value="<?php echo htmlspecialchars($lang); ?>"><?php echo htmlspecialchars($lang); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="filterStatus" class="block text-sm font-medium text-gray-700">Filter by Status:</label>
                <select id="filterStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <?php foreach ($translationStatuses as $status) : ?>
                        <option value="<?php echo htmlspecialchars($status); ?>"><?php echo htmlspecialchars($status); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Source Text (Preview)</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Source Lang</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Target Lang</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Timestamp</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="translationTableBody">
                    <!-- Translation history will be rendered here by JavaScript -->
                    <?php if (empty($translationHistory)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No translation history found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Custom Modals -->
    <!-- Translation Request Modal -->
    <div id="requestModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">New Translation Request</h3>
            <form id="translationRequestForm" onsubmit="return submitTranslationRequest(event)">
                <div class="mb-4">
                    <label for="sourceText" class="block text-sm font-medium text-gray-700">Source Text</label>
                    <textarea id="sourceText" rows="5" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter text to translate" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="sourceLang" class="block text-sm font-medium text-gray-700">Source Language</label>
                    <select id="sourceLang" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <?php foreach ($languages as $lang) : ?>
                            <option value="<?php echo htmlspecialchars($lang); ?>"><?php echo htmlspecialchars($lang); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="targetLang" class="block text-sm font-medium text-gray-700">Target Language</label>
                    <select id="targetLang" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <?php foreach ($languages as $lang) : ?>
                            <option value="<?php echo htmlspecialchars($lang); ?>"><?php echo htmlspecialchars($lang); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeRequestModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" id="translateButton" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Translate
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Translation Details Modal -->
    <div id="detailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">Translation Details</h3>
            <div class="space-y-3 text-gray-700">
                <p><strong>ID:</strong> <span id="modalTranslationId"></span></p>
                <p><strong>Source Language:</strong> <span id="modalSourceLang"></span></p>
                <p><strong>Target Language:</strong> <span id="modalTargetLang"></span></p>
                <p><strong>Status:</strong> <span id="modalTranslationStatus"></span></p>
                <p><strong>Timestamp:</strong> <span id="modalTimestamp"></span></p>
                <p><strong>Requested By:</strong> <span id="modalRequestedBy"></span></p>
                <p><strong>Source Text:</strong></p>
                <div id="modalSourceText" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
                <p><strong>Translated Text:</strong></p>
                <div id="modalTranslatedText" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
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
    // Initial translation history data from PHP
    let translationHistoryData = <?php echo json_encode($translationHistory); ?>;
    const adminUserName = "<?php echo htmlspecialchars($userName); ?>"; // Get admin username from PHP

    // Get references to DOM elements
    const translationTableBody = document.getElementById('translationTableBody');
    const filterSourceLangSelect = document.getElementById('filterSourceLang');
    const filterTargetLangSelect = document.getElementById('filterTargetLang');
    const filterStatusSelect = document.getElementById('filterStatus');

    // Translation Request Modal elements
    const requestModal = document.getElementById('requestModal');
    const sourceTextField = document.getElementById('sourceText');
    const sourceLangField = document.getElementById('sourceLang');
    const targetLangField = document.getElementById('targetLang');
    const translateButton = document.getElementById('translateButton');

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
     * Renders the translation history table based on the provided data.
     * @param {Array} dataToRender - The array of translation objects to display.
     */
    function renderTranslationTable(dataToRender) {
        translationTableBody.innerHTML = ''; // Clear existing rows

        if (dataToRender.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `<td colspan="7" class="px-6 py-4 text-center text-gray-500">No translation history found matching filters.</td>`;
            translationTableBody.appendChild(noDataRow);
            return;
        }

        dataToRender.forEach(translation => {
            const row = document.createElement('tr');
            row.classList.add('hover:bg-gray-50');

            // Determine status badge color
            let statusClass = '';
            if (translation.status === 'Completed') statusClass = 'bg-green-100 text-green-800';
            else if (translation.status === 'Pending') statusClass = 'bg-yellow-100 text-yellow-800';
            else if (translation.status === 'Failed') statusClass = 'bg-red-100 text-red-800';
            else statusClass = 'bg-gray-100 text-gray-800'; // Default

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${translation.id}</td>
                <td class="px-6 py-4 text-sm text-gray-700 truncate max-w-xs">${translation.source_text.substring(0, 50)}...</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${translation.source_lang}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${translation.target_lang}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                        ${translation.status}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${translation.timestamp || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="viewTranslationDetails('${encodeURIComponent(JSON.stringify(translation))}')" class="text-indigo-600 hover:text-indigo-900 mr-4">View</button>
                    <button onclick="deleteTranslation('${translation.id}')" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
            `;
            translationTableBody.appendChild(row);
        });
    }

    /**
     * Filters the translation history data based on selected criteria and re-renders the table.
     */
    function filterTranslations() {
        const selectedSourceLang = filterSourceLangSelect.value;
        const selectedTargetLang = filterTargetLangSelect.value;
        const selectedStatus = filterStatusSelect.value;

        const filteredData = translationHistoryData.filter(translation => {
            const matchesSourceLang = selectedSourceLang === 'All' || translation.source_lang === selectedSourceLang;
            const matchesTargetLang = selectedTargetLang === 'All' || translation.target_lang === selectedTargetLang;
            const matchesStatus = selectedStatus === 'All' || translation.status === selectedStatus;
            return matchesSourceLang && matchesTargetLang && matchesStatus;
        });

        renderTranslationTable(filteredData);
    }

    // Event listeners for filter changes
    filterSourceLangSelect.addEventListener('change', filterTranslations);
    filterTargetLangSelect.addEventListener('change', filterTranslations);
    filterStatusSelect.addEventListener('change', filterTranslations);

    // Initial render of the table when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        renderTranslationTable(translationHistoryData);

        /**
         * Opens the new translation request modal.
         */
        window.openRequestModal = function() {
            requestModal.classList.remove('hidden');
            sourceTextField.value = '';
            sourceLangField.value = 'English'; // Default
            targetLangField.value = 'Filipino'; // Default
        };

        /**
         * Closes the new translation request modal.
         */
        window.closeRequestModal = function() {
            requestModal.classList.add('hidden');
        };

        /**
         * Simulates submitting a translation request using an LLM.
         * @param {Event} event - The form submission event.
         */
        window.submitTranslationRequest = async function(event) {
            event.preventDefault(); // Prevent default form submission

            const sourceText = sourceTextField.value.trim();
            const sourceLang = sourceLangField.value;
            const targetLang = targetLangField.value;

            if (!sourceText || !sourceLang || !targetLang) {
                showAlert('Please fill in all required fields.', 'Input Error');
                return false;
            }
            if (sourceLang === targetLang) {
                showAlert('Source and Target languages cannot be the same.', 'Input Error');
                return false;
            }

            translateButton.textContent = 'Translating...';
            translateButton.disabled = true;

            const now = new Date();
            const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;

            let newTranslation = {
                id: 'TRN-' + (translationHistoryData.length + 1).toString().padStart(3, '0'), // Simple ID generation
                source_text: sourceText,
                translated_text: 'Translating...', // Placeholder while processing
                source_lang: sourceLang,
                target_lang: targetLang,
                status: 'Pending',
                timestamp: timestamp,
                requested_by: adminUserName
            };

            translationHistoryData.unshift(newTranslation); // Add to top of list
            filterTranslations(); // Re-render to show pending translation
            closeRequestModal();

            try {
                // Simulate LLM API call for translation
                const prompt = `Translate the following text from ${sourceLang} to ${targetLang}: "${sourceText}"`;
                let chatHistory = [];
                chatHistory.push({ role: "user", parts: [{ text: prompt }] });
                const payload = { contents: chatHistory };
                const apiKey = ""; // Canvas will provide this
                const apiUrl = `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=${apiKey}`;

                const response = await fetch(apiUrl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(payload)
                });

                const result = await response.json();

                let translatedText = 'Translation failed.';
                let status = 'Failed';

                if (result.candidates && result.candidates.length > 0 &&
                    result.candidates[0].content && result.candidates[0].content.parts &&
                    result.candidates[0].content.parts.length > 0) {
                    translatedText = result.candidates[0].content.parts[0].text;
                    status = 'Completed';
                } else {
                    console.error('LLM response structure unexpected:', result);
                    showAlert('Translation failed: Unexpected API response.', 'Translation Error');
                }

                // Update the newly added translation entry
                const index = translationHistoryData.findIndex(t => t.id === newTranslation.id);
                if (index !== -1) {
                    translationHistoryData[index].translated_text = translatedText;
                    translationHistoryData[index].status = status;
                    translationHistoryData[index].timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;
                }

                filterTranslations(); // Re-render with updated status and text
                showAlert(`Translation ${newTranslation.id} ${status}!`, 'Translation Result');

            } catch (error) {
                console.error('Error during translation API call:', error);
                // Update the status to failed if an error occurs
                const index = translationHistoryData.findIndex(t => t.id === newTranslation.id);
                if (index !== -1) {
                    translationHistoryData[index].translated_text = 'Translation failed due to network error.';
                    translationHistoryData[index].status = 'Failed';
                    translationHistoryData[index].timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;
                }
                filterTranslations();
                showAlert('Translation failed: Network error or API issue.', 'Translation Error');
            } finally {
                translateButton.textContent = 'Translate';
                translateButton.disabled = false;
            }
            return false;
        };

        /**
         * Opens the translation details modal with the given translation's data.
         * @param {string} translationJson - JSON string of the translation entry.
         */
        window.viewTranslationDetails = function(translationJson) {
            const translation = JSON.parse(decodeURIComponent(translationJson));
            document.getElementById('modalTranslationId').textContent = translation.id;
            document.getElementById('modalSourceLang').textContent = translation.source_lang;
            document.getElementById('modalTargetLang').textContent = translation.target_lang;
            document.getElementById('modalTranslationStatus').textContent = translation.status;
            document.getElementById('modalTimestamp').textContent = translation.timestamp || 'N/A';
            document.getElementById('modalRequestedBy').textContent = translation.requested_by || 'N/A';
            document.getElementById('modalSourceText').textContent = translation.source_text || 'No source text provided.';
            document.getElementById('modalTranslatedText').textContent = translation.translated_text || 'No translated text available.';

            document.getElementById('detailsModal').classList.remove('hidden');
        };

        // Close translation details modal
        document.getElementById('closeDetailsModal').addEventListener('click', function() {
            document.getElementById('detailsModal').classList.add('hidden');
        });

        /**
         * Deletes a translation entry from the history.
         * @param {string} id - The ID of the translation to delete.
         */
        window.deleteTranslation = function(id) {
            showConfirm(`Are you sure you want to delete translation ${id} from history? This action cannot be undone.`, (confirmed) => {
                if (confirmed) {
                    translationHistoryData = translationHistoryData.filter(t => t.id !== id);
                    showAlert(`Translation ${id} deleted successfully.`, 'Deletion Successful');
                    filterTranslations(); // Re-render table
                }
            }, 'Delete Translation');
        };
    });
</script>
