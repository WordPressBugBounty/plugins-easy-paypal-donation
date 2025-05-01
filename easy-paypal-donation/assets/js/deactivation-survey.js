jQuery(document).ready(function($) {
    // Create and append the survey modal
    var surveyHTML = `
        <div id="wpedon-deactivation-survey" style="display: none;">
            <div class="wpedon-survey-content">
                <h2>${wpedonDeactivationSurvey.strings.title}</h2>
                <p>${wpedonDeactivationSurvey.strings.description}</p>
                <form id="wpedon-deactivation-form">
                    <div class="wpedon-survey-options">
                        ${Object.entries(wpedonDeactivationSurvey.deactivationOptions).map(([key, value]) => `
                            <label>
                                <input type="radio" name="deactivation_reason" value="${key}">
                                ${value}
                            </label>
                            ${key === 'found_better' ? `<div class="wpedon-additional-field" data-for="found_better" style="display: none;">
                                <textarea name="user-reason" class="" rows="6" style="border-spacing: 0; width: 100%; clear: both; margin: 0;" placeholder="${wpedonDeactivationSurvey.strings.betterPluginQuestion}"></textarea>
                            </div>` : ''}
                            ${key === 'not_working' ? `<div class="wpedon-additional-field" data-for="not_working" style="display: none;">
                                <textarea name="user-reason" class="" rows="6" style="border-spacing: 0; width: 100%; clear: both; margin: 0;" placeholder="${wpedonDeactivationSurvey.strings.notWorkingQuestion}"></textarea>
                            </div>` : ''}
                        `).join('')}
                    </div>
                    <div id="wpedon-other-reason" style="display: none;">
                        <textarea name="user-reason" class="" rows="6" style="border-spacing: 0; width: 100%; clear: both; margin: 0;" placeholder="${wpedonDeactivationSurvey.strings.otherPlaceholder}"></textarea>
                    </div>
                    <div id="wpedon-error-notice" class="notice notice-error" style="display: none; margin: 10px 0;">
                        <p>${wpedonDeactivationSurvey.strings.errorRequired}</p>
                    </div>
                    <div class="wpedon-survey-buttons" style="display: flex; justify-content: space-between; margin-top: 20px;">
                        <div>
                            <button type="button" class="button button-secondary" id="wpedon-skip-survey">${wpedonDeactivationSurvey.strings.skipButton}</button>
                        </div>
                        <div>
                            <button type="button" class="button button-secondary" id="wpedon-cancel-survey">${wpedonDeactivationSurvey.strings.cancelButton}</button>
                            <button type="submit" class="button button-primary">${wpedonDeactivationSurvey.strings.submitButton}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    `;

    $('body').append(surveyHTML);

    // Show survey when deactivation link is clicked
    $(document).on('click', 'a[href*="action=deactivate&plugin=easy-paypal-donation"]', function(e) {
        e.preventDefault();
        $('#wpedon-deactivation-survey').show();
    });

    // Handle escape key
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape' && $('#wpedon-deactivation-survey').is(':visible')) {
            $('#wpedon-deactivation-survey').hide();
        }
    });

    // Handle cancel button
    $('#wpedon-cancel-survey').on('click', function() {
        $('#wpedon-deactivation-survey').hide();
    });

    // Handle radio button changes
    $('input[name="deactivation_reason"]').on('change', function() {
        var selectedValue = $(this).val();
        
        // Hide all additional fields first
        $('.wpedon-additional-field').hide();
        $('#wpedon-other-reason').hide();
        $('#wpedon-error-notice').hide();
        
        // Remove error styling from all textareas
        $('textarea[name="user-reason"]').css('border-color', '');
        
        // Show relevant field based on selection
        if (selectedValue === 'other') {
            $('#wpedon-other-reason').show();
        } else if (selectedValue === 'found_better' || selectedValue === 'not_working') {
            $(`.wpedon-additional-field[data-for="${selectedValue}"]`).show();
        }
    });

    // Handle textarea input to remove error styling
    $('textarea[name="user-reason"]').on('input', function() {
        $(this).css('border-color', '');
        $('#wpedon-error-notice').hide();
    });

    // Handle skip button
    $('#wpedon-skip-survey').on('click', function() {
        window.location.href = $('a[href*="action=deactivate&plugin=easy-paypal-donation"]').attr('href');
    });

    // Handle form submission
    $('#wpedon-deactivation-form').on('submit', function(e) {
        e.preventDefault();
        
        var reason = $('input[name="deactivation_reason"]:checked').val();
        var additionalReason = '';
        var $textarea = null;
        
        // Get the appropriate additional reason based on the selected option
        if (reason === 'other') {
            $textarea = $('#wpedon-other-reason textarea');
            additionalReason = $textarea.val();
        } else if (reason === 'found_better') {
            $textarea = $('.wpedon-additional-field[data-for="found_better"] textarea');
            additionalReason = $textarea.val();
        } else if (reason === 'not_working') {
            $textarea = $('.wpedon-additional-field[data-for="not_working"] textarea');
            additionalReason = $textarea.val();
        }
        
        // Hide any existing error notice
        $('#wpedon-error-notice').hide();
        
        // Remove error styling from all textareas
        $('textarea[name="user-reason"]').css('border-color', '');
        
        // Validate required fields
        if ((reason === 'other' || reason === 'found_better' || reason === 'not_working') && !additionalReason) {
            $('#wpedon-error-notice').show();
            if ($textarea) {
                $textarea.css('border-color', '#dc3232');
            }
            return;
        }
        
        $.ajax({
            url: 'https://wpplugin.org/wp-json/wpplugin/v1/deactivation-survey',
            method: 'POST',
            data: {
                plugin_slug: 'easy-paypal-donation',
                plugin_version: wpedonDeactivationSurvey.pluginVersion,
                reason: reason,
                additional_reason: additionalReason
            },
            success: function() {
                window.location.href = $('a[href*="action=deactivate&plugin=easy-paypal-donation"]').attr('href');
            },
            error: function() {
                window.location.href = $('a[href*="action=deactivate&plugin=easy-paypal-donation"]').attr('href');
            }
        });
    });
}); 