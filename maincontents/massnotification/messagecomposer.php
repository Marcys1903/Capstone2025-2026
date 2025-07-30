<?php
// --- PHP PLACEHOLDER LOGIC ---
// This block is for demonstration purposes. In a real application,
// user authentication and profile data would be managed globally,
// likely in index.php or a common header file included before content.
$isLoggedIn = true; // Assume user is logged in for demonstration
$userName = "Admin Marcus"; // Example user name
$userProfilePic = ""; // Set to empty string to simulate no picture uploaded, or a valid URL
$hasProfilePic = !empty($userProfilePic);

// Placeholder for predefined templates (in a real app, these would come from a database)
$templates = [
    ['id' => 'typhoon', 'name' => 'Typhoon Warning', 'subject' => 'URGENT: Typhoon [TyphoonName] Alert for [Location]', 'sms_content' => 'Typhoon [TyphoonName] expected in [Location] by [Time]. Prepare for heavy rains & winds. Stay safe!'],
    ['id' => 'evacuation', 'name' => 'Evacuation Notice', 'subject' => 'IMMEDIATE EVACUATION: [Location]', 'sms_content' => 'Immediate evacuation for [Location]. Proceed to [EvacuationCenter]. Stay calm, follow authorities.'],
    ['id' => 'system_maintenance', 'name' => 'System Maintenance', 'subject' => 'System Maintenance Advisory', 'sms_content' => 'System maintenance from [StartTime] to [EndTime]. Service interruption expected. Thank you for your patience.'],
    ['id' => 'fire_incident', 'name' => 'Fire Incident', 'subject' => 'FIRE ALERT: [Location]', 'sms_content' => 'Fire incident reported at [Location]. Emergency services en route. Avoid the area.']
];
// --- END PHP PLACEHOLDER LOGIC ---
?>

<div class=" text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Message Composer</h1>

        <?php if ($isLoggedIn) : ?>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Message Drafting Interface</h2>

        <div class="mb-6">
            <label for="message_template" class="block text-sm font-medium text-gray-700 mb-2">Use Predefined Template:</label>
            <select id="message_template" class="mt-1 block w-full md:w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <option value="">-- Select a Template --</option>
                <?php foreach ($templates as $template) : ?>
                    <option value="<?php echo htmlspecialchars($template['id']); ?>"
                            data-sms-content="<?php echo htmlspecialchars($template['sms_content']); ?>"
                            data-email-subject="<?php echo htmlspecialchars($template['subject']); ?>">
                        <?php echo htmlspecialchars($template['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <p class="text-xs text-gray-500 mt-1">Selecting a template will auto-fill message fields. Remember to replace [Dynamic Fields]!</p>
        </div>

        <div class="mb-4">
            <label for="message_subject" class="block text-sm font-medium text-gray-700 mb-1">Message Subject (for Email)</label>
            <input type="text" id="message_subject" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Subject for email alerts">
        </div>

        <div class="mb-6">
            <label for="message_content" class="block text-sm font-medium text-gray-700 mb-1">Core Message Content</label>
            <textarea id="message_content" rows="8" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Compose your alert message here..."></textarea>
            <p class="text-xs text-gray-500 mt-1">
                This content will be used for SMS, Email body, or as a script for PA system.
                <br>For email, supports basic rich text (bold, lists, hyperlinks if supported by the final email sending module).
            </p>
        </div>

        <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-md">
            <label for="pa_audio_file" class="block text-sm font-medium text-gray-700 mb-1">PA System Audio (Optional)</label>
            <input type="file" id="pa_audio_file" accept="audio/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            <p class="text-xs text-gray-500 mt-1">Upload an audio file for PA system alerts, or use live microphone broadcast option in Channel Selector.</p>
        </div>

        <h3 class="text-lg font-semibold text-gray-800 mb-3">Message Previews</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-100 p-4 rounded-md border border-gray-200">
                <p class="text-sm font-medium text-gray-700 mb-2">SMS Preview (Mock Phone Screen):</p>
                <div class="bg-white p-3 rounded-lg border border-gray-300 min-h-[100px] flex items-start">
                    <div class="w-2 h-2 rounded-full bg-blue-500 mr-2 mt-1"></div>
                    <div class="flex-1">
                        <p class="text-xs text-gray-500 mb-1">Sender: EmergencyAlert</p>
                        <p id="sms_preview_text" class="text-gray-800 text-sm"></p>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">Characters: <span id="sms_char_count">0</span>/160 (per segment)</p>
                <p id="sms_validation_warning" class="text-red-600 text-xs mt-1 hidden">Warning: Message exceeds 160 characters and may be sent in multiple segments or truncated.</p>
            </div>

            <div class="bg-gray-100 p-4 rounded-md border border-gray-200">
                <p class="text-sm font-medium text-gray-700 mb-2">Email Preview (Mock Inbox View):</p>
                <div class="bg-white p-3 rounded-lg border border-gray-300 min-h-[100px]">
                    <p class="text-xs text-gray-500 mb-1">From: <span class="font-semibold">Emergency Platform &lt;no-reply@yourplatform.com&gt;</span></p>
                    <p class="text-sm font-semibold mb-1">Subject: <span id="email_preview_subject"></span></p>
                    <p id="email_preview_body" class="text-gray-800 text-sm overflow-hidden whitespace-pre-wrap"></p>
                    <p class="text-xs text-gray-500 mt-2">Attachments: <span id="email_attachments_count">0</span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Scheduling Options</h2>

        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="radio" name="delivery_option" value="send_now" checked class="form-radio h-4 w-4 text-blue-600">
                <span class="ml-2 text-gray-700">Send Immediately</span>
            </label>
            <label class="inline-flex items-center ml-6">
                <input type="radio" name="delivery_option" value="schedule_later" class="form-radio h-4 w-4 text-blue-600">
                <span class="ml-2 text-gray-700">Schedule for Later</span>
            </label>
        </div>

        <div id="schedule_datetime_picker" class="hidden grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <div>
                <label for="scheduled_date" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                <input type="date" id="scheduled_date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div>
                <label for="scheduled_time" class="block text-sm font-medium text-gray-700 mb-1">Time</label>
                <input type="time" id="scheduled_time" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <p class="md:col-span-2 text-xs text-gray-500 mt-1">Time zone awareness will be handled by the system (e.g., UTC conversion).</p>
        </div>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Alert Categorization & Priority</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="alert_type_tag" class="block text-sm font-medium text-gray-700 mb-2">Alert Type Tagging</label>
                <select id="alert_type_tag" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">-- Select Category --</option>
                    <option value="weather">Weather</option>
                    <option value="fire">Fire</option>
                    <option value="medical">Medical</option>
                    <option value="security">Security</option>
                    <option value="traffic">Traffic</option>
                    <option value="maintenance">System Maintenance</option>
                    <option value="other">Other</option>
                </select>
                <p class="text-xs text-gray-500 mt-1">Helps organize delivery reports and can be used for automated routing.</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Message Urgency Level</label>
                <div class="flex flex-col space-y-2">
                    <label class="inline-flex items-center">
                        <input type="radio" name="priority_level" value="normal" checked class="form-radio h-4 w-4 text-gray-600">
                        <span class="ml-2 text-gray-700">Normal</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="priority_level" value="high" class="form-radio h-4 w-4 text-yellow-600">
                        <span class="ml-2 text-gray-700">High</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="priority_level" value="critical" class="form-radio h-4 w-4 text-red-600">
                        <span class="ml-2 text-gray-700 font-semibold">Critical</span>
                    </label>
                </div>
                <p class="text-xs text-red-600 mt-1">Critical messages bypass certain restrictions (e.g., opt-outs) and are prioritized.</p>
            </div>
        </div>
    </section>

    <div class="flex justify-end space-x-4 mt-6">
        <button type="button" class="inline-flex justify-center py-2 px-6 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
            Cancel
        </button>
        <button type="submit" class="inline-flex justify-center py-2 px-6 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
            Save Message
        </button>
        <button type="submit" class="inline-flex justify-center py-2 px-6 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200" id="send_alert_button">
            Send Alert
        </button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const messageContent = document.getElementById('message_content');
    const messageSubject = document.getElementById('message_subject');
    const smsCharCount = document.getElementById('sms_char_count');
    const smsPreviewText = document.getElementById('sms_preview_text');
    const emailPreviewSubject = document.getElementById('email_preview_subject');
    const emailPreviewBody = document.getElementById('email_preview_body');
    const smsValidationWarning = document.getElementById('sms_validation_warning');
    const paAudioFile = document.getElementById('pa_audio_file');
    const emailAttachmentsCount = document.getElementById('email_attachments_count');
    const messageTemplate = document.getElementById('message_template');

    // Scheduling Options
    const deliveryOptions = document.querySelectorAll('input[name="delivery_option"]');
    const scheduleDatetimePicker = document.getElementById('schedule_datetime_picker');
    const scheduledDate = document.getElementById('scheduled_date');
    const scheduledTime = document.getElementById('scheduled_time');

    function updatePreviews() {
        const content = messageContent.value;
        const subject = messageSubject.value;

        // SMS Preview
        smsPreviewText.textContent = content;
        smsCharCount.textContent = content.length;
        if (content.length > 160) {
            smsValidationWarning.classList.remove('hidden');
        } else {
            smsValidationWarning.classList.add('hidden');
        }

        // Email Preview
        emailPreviewSubject.textContent = subject;
        emailPreviewBody.textContent = content; // Using textContent for plain text, can be updated for rich text parsing if a full editor is integrated later.
    }

    function updateAttachmentsCount() {
        if (paAudioFile && paAudioFile.files) {
            emailAttachmentsCount.textContent = paAudioFile.files.length;
        } else {
            emailAttachmentsCount.textContent = '0';
        }
    }

    // Event Listeners for Live Previews
    if (messageContent) messageContent.addEventListener('input', updatePreviews);
    if (messageSubject) messageSubject.addEventListener('input', updatePreviews);
    if (paAudioFile) paAudioFile.addEventListener('change', updateAttachmentsCount); // Assuming PA audio file counts as an attachment for email preview simplicity

    // Template Selection Logic
    if (messageTemplate) {
        messageTemplate.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const smsContent = selectedOption.getAttribute('data-sms-content');
            const emailSubject = selectedOption.getAttribute('data-email-subject');

            if (smsContent !== null) { // Check if a template was actually selected
                messageContent.value = smsContent;
            } else {
                messageContent.value = ''; // Clear if no template selected
            }

            if (emailSubject !== null) {
                messageSubject.value = emailSubject;
            } else {
                messageSubject.value = ''; // Clear if no template selected
            }
            updatePreviews(); // Update previews after applying template
        });
    }

    // Scheduling Option Logic
    deliveryOptions.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === 'schedule_later') {
                scheduleDatetimePicker.classList.remove('hidden');
                // Set default date/time to tomorrow/current time if empty
                if (!scheduledDate.value) {
                    const tomorrow = new Date();
                    tomorrow.setDate(tomorrow.getDate() + 1);
                    scheduledDate.value = tomorrow.toISOString().split('T')[0];
                }
                if (!scheduledTime.value) {
                    const now = new Date();
                    scheduledTime.value = now.toTimeString().slice(0, 5);
                }
            } else {
                scheduleDatetimePicker.classList.add('hidden');
            }
        });
    });

    // Initial updates on page load
    updatePreviews();
    updateAttachmentsCount();
});
</script>