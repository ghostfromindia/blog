Dear {{$user->name}}, <br><br>

We received a request to reset your password for your account on {{config('app.name')}}. If you did not make this request, please ignore this email.<br><br>

To reset your password, please click the link below:<br>

<a href="{{url('change-password?email='.($user->email).'&code='.($user->otp))}}">Reset password</a><br><br>

If the link above does not work, please copy and paste the following URL into your browser:<br>

{{url('change-password?email='.($user->email).'&code='.($user->otp))}}<br><br>

For your security, this link will expire in 24 hours. If you need a new link, please request a new password reset.<br>

If you have any questions or need further assistance, feel free to contact our support team.
<br><br>
Thank you,<br>
{{config('app.name')}}
