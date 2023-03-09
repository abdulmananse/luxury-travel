<x-app-layout>
    <section class="backgroundColor">
        <div class="container add-agents-page">
            <div class="back-step">
                <img src="./img/arrowinvalid-name@3x.png" />
                <p>Back</p>
            </div>
            <h3>Add agents</h3>
            <p id="add-agents-p" style="font-family: 'playfair-display-regular' !important">
                Enter up to 100 travel agent emails, separated by commas or by space.
            </p>

            <form method="POST" action="{{ route('agents.sendInvitation') }}">
                @csrf

                <x-textarea id="email" rows="9" name="emails" /> <br />
                {!! $errors->first('emails', '<label class="error">:message</label>') !!}
                <div class="d-flex add-invites">
                    <p>
                        Duplicates will be removed. Already active<br />emails will not
                        receive another invite.
                    </p>
                    <div class="agents-button">
                        <button class="cancel">Cancel</button>
                        <button type="submit" class="invites">Send Invites</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

</x-app-layout>
