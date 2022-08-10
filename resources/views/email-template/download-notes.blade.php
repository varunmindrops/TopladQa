<p><strong>Dear student</strong></p>
<p>Here are your {{ $details['title'] }} Notes by {{ $details['faculty_name'] }}.Our faculties specially curate
    these notes to help
    students learn better and faster. They will cover all topics in detail along with some questions and answers to help
    you practice. So, go ahead and start learning!</p>

<p>Follow/Subscribe to our social media channels to keep yourself updated with {{ strtoupper($details['segment']) }}
    news,
    announcements, free doubt classes, Q&A sessions, video lectures, offers, notes, jobs etc:</p>

<p>PDF LINK : {{ str_replace(' ', '%20', $details['file']) }}</p>

@if ($details['segment'] == 'cma')
    <p>Youtube: https://www.youtube.com/c/TopladCMA</p>
    <p>Facebook: https://www.facebook.com/toplad</p>
    <p>Instagram: https://www.instagram.com/toplad.in/</p>
    <p>LinkedIn: https://www.linkedin.com/company/toplad</p>
    <p>Telegram: https://t.me/TopLadCMA</p>
@elseif ($details['segment'] == 'cs')
    <p>Youtube: https://www.youtube.com/c/TopladCS</p>
    <p>Facebook: https://www.facebook.com/toplad</p>
    <p>Instagram: https://www.instagram.com/toplad.in/</p>
    <p>LinkedIn: https://www.linkedin.com/company/toplad</p>
    <p>Telegram: https://t.me/TopLadCS</p>
@elseif ($details['segment'] == 'ca')
    <p>Youtube: https://www.youtube.com/c/TopladCA</p>
    <p>Facebook: https://www.facebook.com/toplad</p>
    <p>Instagram: https://www.instagram.com/toplad.in/</p>
    <p>LinkedIn: https://www.linkedin.com/company/toplad</p>
    <p>Telegram: https://t.me/TopLadCA</p>
@endif
<br>

<p><strong>Thanks and Regards</strong></p>
<p>Team TopLad</p>
@if ($details['segment'] == 'cma')
    <p>Website: https://toplad.in/cma</p>
@elseif ($details['segment'] == 'ca')
    <p>Website: https://toplad.in/ca</p>
@elseif ($details['segment'] == 'cs')
    <p>Website: https://toplad.in/cs</p>
@endif
<p>WhatsApp: https://api.whatsapp.com/send?phone=9953155682</p>
<p>Toll Free Number:18003091245</p>
