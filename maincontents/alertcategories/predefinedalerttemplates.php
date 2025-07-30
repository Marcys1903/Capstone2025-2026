<?php
// Section Start: PHP Logic
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = "";
$alertTemplates = [
    [
        'id' => 'TPL-001',
        'name' => 'Severe Flood Advisory',
        'event_type' => 'Flooding',
        'severity' => 'Severe',
        'sms_content' => '⚠️ Flood Alert: Residents of [Location] advised to evacuate due to rising floodwaters. Proceed to [EvacuationCenter].',
        'email_subject' => 'URGENT: Severe Flood Advisory - Evacuation Recommended for [Location]',
        'email_body' => 'Dear Residents,\n\nThis is an urgent alert regarding severe flooding in [Location]. Floodwaters are rising rapidly as of [Time] on [Date]. We strongly advise all residents in the affected area to evacuate immediately to the nearest designated evacuation center: [EvacuationCenter].\n\nFor your safety, please avoid flooded areas and follow all instructions from local authorities. Keep essential items, identification, and medication with you. Stay tuned to official channels for further updates. \n\nEmergency Contact: [ContactInfo]\n\nStay safe,\nLGU Emergency Response Team',
        'pa_script' => 'Attention residents of [Location]. This is a severe flood advisory. Floodwaters are rising. Please evacuate immediately to [EvacuationCenter]. Repeat: Evacuate immediately.'
    ],
    [
        'id' => 'TPL-002',
        'name' => 'Minor Earthquake Update',
        'event_type' => 'Earthquake',
        'severity' => 'Mild',
        'sms_content' => 'Minor earthquake detected in [Location]. No immediate Tsunami threat. Stay calm and be aware of aftershocks.',
        'email_subject' => 'Minor Earthquake Update for [Location] - No Major Threat',
        'email_body' => 'Dear Community,\n\nAt approximately [Time] on [Date], a minor earthquake was detected with its epicenter near [Location]. Initial assessments indicate no significant damage or immediate threat of tsunami. We advise everyone to remain calm, check for any minor damages in your surroundings, and be prepared for potential aftershocks.\n\nFor emergencies, contact [ContactInfo].\n\nSincerely,\nLocal Disaster Management',
        'pa_script' => 'This is a general announcement. A minor earthquake has occurred near [Location]. There is no immediate danger. Please remain calm.'
    ],
    [
        'id' => 'TPL-003',
        'name' => 'Critical Security Threat - Lockdown',
        'event_type' => 'Security Threat',
        'severity' => 'Critical',
        'sms_content' => '🚨 Critical Security Threat: [Location] on immediate lockdown. Seek shelter, stay silent, lock doors. Wait for all clear.',
        'email_subject' => 'CRITICAL ALERT: IMMEDIATE LOCKDOWN - [Location]',
        'email_body' => 'URGENT ATTENTION:\n\nA critical security threat has been confirmed at [Location]. All personnel and residents in the affected area must initiate an immediate lockdown procedure. Seek the nearest safe shelter, remain silent, and lock all doors. Do NOT open doors for anyone until an official "all clear" message is broadcast. Emergency services are en route. Further instructions will follow as soon as it is safe to communicate. \n\nStay safe and follow instructions.\nSecurity Operations Center',
        'pa_script' => 'Attention all personnel and residents in [Location]. This is a critical security alert. Initiate immediate lockdown procedures. Seek shelter, stay silent. Do not open doors. Wait for official all clear.'
    ],
];
// Section End: PHP Logic
?>
<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Predefined Alert Templates</h1>
        <?php
        $hasProfilePic = !empty($userProfilePic);

        if ($isLoggedIn) :
        ?>
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
    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Manage Predefined Alert Templates</h2>
        <p class="text-gray-700 leading-relaxed mb-6">
            Add, edit, or remove alert templates to standardize communication for various incident types and severity levels.
        </p>

        <div class="mb-6 text-right">
            <button onclick="openTemplateModal('new')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Add New Template
            </button>
        </div>

        <div class="overflow-x-auto mb-8">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Event Type</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Severity</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($alertTemplates)) : ?>
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No alert templates defined.</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($alertTemplates as $template) : ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($template['id']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($template['name']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($template['event_type']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($template['severity']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button onclick="previewTemplate('<?php echo htmlspecialchars($template['id']); ?>')" class="text-indigo-600 hover:text-indigo-900 mr-4">Preview</button>
                                    <button onclick="openTemplateModal('edit', '<?php echo htmlspecialchars($template['id']); ?>')" class="text-blue-600 hover:text-blue-900 mr-4">Edit</button>
                                    <button onclick="deleteTemplate('<?php echo htmlspecialchars($template['id']); ?>')" class="text-red-600 hover:text-red-900">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div id="templatePreview" class="hidden bg-gray-50 p-6 rounded-lg border border-gray-200">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Template Preview: <span id="previewName" class="font-normal"></span></h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-md font-semibold text-gray-700 mb-2">SMS Content:</p>
                    <p id="previewSms" class="text-sm text-gray-900 bg-white p-3 rounded-md border border-gray-300 whitespace-pre-wrap"></p>
                </div>
                <div>
                    <p class="text-md font-semibold text-gray-700 mb-2">Email Subject:</p>
                    <p id="previewEmailSubject" class="text-sm text-gray-900 bg-white p-3 rounded-md border border-gray-300"></p>
                </div>
                <div class="md:col-span-2">
                    <p class="text-md font-semibold text-gray-700 mb-2">Email Body:</p>
                    <p id="previewEmailBody" class="text-sm text-gray-900 bg-white p-3 rounded-md border border-gray-300 whitespace-pre-wrap"></p>
                </div>
                <div class="md:col-span-2">
                    <p class="text-md font-semibold text-gray-700 mb-2">PA System Script:</p>
                    <p id="previewPaScript" class="text-sm text-gray-900 bg-white p-3 rounded-md border border-gray-300 whitespace-pre-wrap"></p>
                </div>
            </div>
            <div class="text-right mt-6">
                <button onclick="hidePreview()" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Close Preview
                </button>
            </div>
        </div>
    </section>
</div>

<div id="alertTemplateModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="template-modal-title">
                            Manage Alert Template
                        </h3>
                        <div class="mt-2 space-y-4">
                            <div>
                                <label for="templateId" class="block text-sm font-medium text-gray-700">Template ID</label>
                                <input type="text" id="templateId" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" readonly>
                            </div>
                            <div>
                                <label for="templateName" class="block text-sm font-medium text-gray-700">Template Name</label>
                                <input type="text" id="templateName" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                            </div>
                            <div>
                                <label for="templateEventType" class="block text-sm font-medium text-gray-700">Event Type</label>
                                <select id="templateEventType" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                    <option value="">-- Select Event Type --</option>
                                    <option value="Flooding">Flooding</option>
                                    <option value="Earthquake">Earthquake</option>
                                    <option value="Security Threat">Security Threat</option>
                                    <option value="Fire">Fire</option>
                                    <option value="Medical Emergency">Medical Emergency</option>
                                </select>
                            </div>
                            <div>
                                <label for="templateSeverity" class="block text-sm font-medium text-gray-700">Severity</label>
                                <select id="templateSeverity" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                    <option value="">-- Select Severity --</option>
                                    <option value="Critical">Critical</option>
                                    <option value="Severe">Severe</option>
                                    <option value="Moderate">Moderate</option>
                                    <option value="Mild">Mild</option>
                                    <option value="Informational">Informational</option>
                                </select>
                            </div>
                            <div>
                                <label for="templateSms" class="block text-sm font-medium text-gray-700">SMS Content</label>
                                <textarea id="templateSms" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" placeholder="Max 160 characters"></textarea>
                            </div>
                            <div>
                                <label for="templateEmailSubject" class="block text-sm font-medium text-gray-700">Email Subject</label>
                                <input type="text" id="templateEmailSubject" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                            </div>
                            <div>
                                <label for="templateEmailBody" class="block text-sm font-medium text-gray-700">Email Body</label>
                                <textarea id="templateEmailBody" rows="6" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"></textarea>
                            </div>
                            <div>
                                <label for="templatePaScript" class="block text-sm font-medium text-gray-700">PA System Script</label>
                                <textarea id="templatePaScript" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" id="saveTemplateBtn" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Save
                </button>
                <button type="button" onclick="closeTemplateModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    const alertTemplates = <?php echo json_encode($alertTemplates); ?>;

    function previewTemplate(templateId) {
        const template = alertTemplates.find(t => t.id === templateId);
        if (template) {
            document.getElementById('previewName').innerText = template.name;
            document.getElementById('previewSms').innerText = template.sms_content;
            document.getElementById('previewEmailSubject').innerText = template.email_subject;
            document.getElementById('previewEmailBody').innerText = template.email_body;
            document.getElementById('previewPaScript').innerText = template.pa_script;
            document.getElementById('templatePreview').classList.remove('hidden');
        }
    }

    function hidePreview() {
        document.getElementById('templatePreview').classList.add('hidden');
    }

    let currentTemplateId = null;

    function openTemplateModal(mode, id = null) {
        currentTemplateId = id;
        const modal = document.getElementById('alertTemplateModal');
        const modalTitle = document.getElementById('template-modal-title');
        const templateIdField = document.getElementById('templateId');
        const templateNameField = document.getElementById('templateName');
        const templateEventTypeField = document.getElementById('templateEventType');
        const templateSeverityField = document.getElementById('templateSeverity');
        const templateSmsField = document.getElementById('templateSms');
        const templateEmailSubjectField = document.getElementById('templateEmailSubject');
        const templateEmailBodyField = document.getElementById('templateEmailBody');
        const templatePaScriptField = document.getElementById('templatePaScript');

        if (mode === 'new') {
            modalTitle.innerText = 'Add New Alert Template';
            templateIdField.value = 'TPL-' + Math.floor(Math.random() * 1000).toString().padStart(3, '0');
            templateNameField.value = '';
            templateEventTypeField.value = '';
            templateSeverityField.value = '';
            templateSmsField.value = '';
            templateEmailSubjectField.value = '';
            templateEmailBodyField.value = '';
            templatePaScriptField.value = '';
            templateIdField.readOnly = true;
        } else if (mode === 'edit' && id) {
            modalTitle.innerText = 'Edit Alert Template';
            templateIdField.readOnly = true;
            const template = alertTemplates.find(t => t.id === id);
            if (template) {
                templateIdField.value = template.id;
                templateNameField.value = template.name;
                templateEventTypeField.value = template.event_type;
                templateSeverityField.value = template.severity;
                templateSmsField.value = template.sms_content;
                templateEmailSubjectField.value = template.email_subject;
                templateEmailBodyField.value = template.email_body;
                templatePaScriptField.value = template.pa_script;
            }
        }
        modal.classList.remove('hidden');
    }

    function closeTemplateModal() {
        document.getElementById('alertTemplateModal').classList.add('hidden');
    }

    function saveTemplate() {
        const id = document.getElementById('templateId').value;
        const name = document.getElementById('templateName').value;
        const eventType = document.getElementById('templateEventType').value;
        const severity = document.getElementById('templateSeverity').value;
        const smsContent = document.getElementById('templateSms').value;
        const emailSubject = document.getElementById('templateEmailSubject').value;
        const emailBody = document.getElementById('templateEmailBody').value;
        const paScript = document.getElementById('templatePaScript').value;

        alert(`Saving Template:\nID: ${id}\nName: ${name}\nEvent Type: ${eventType}\nSeverity: ${severity}\nSMS: ${smsContent}\nEmail Subject: ${emailSubject}\nEmail Body: ${emailBody}\nPA Script: ${paScript}`);
        closeTemplateModal();
        location.reload();
    }

    function deleteTemplate(id) {
        if (confirm(`Are you sure you want to delete template ${id}?`)) {
            alert(`Deleting template ${id}`);
            location.reload();
        }
    }

    document.getElementById('saveTemplateBtn').addEventListener('click', saveTemplate);
</script>