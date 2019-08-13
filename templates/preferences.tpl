
{* <h1>{$mod->Lang('preferences')}</h1> *}

{$form_start}

	<div class="pageoverflow">
		<p class="pageinput">
			<input type="submit" name="{$actionid}submit" value="{$mod->Lang('submit')}"/>
			<input type="submit" name="{$actionid}cancel" value="{$mod->Lang('cancel')}"/>
		</p>
	</div>


	<fieldset>
		<legend>{$mod->Lang('css_preprocessor')}</legend>

		<div class="pageoverflow">
			<p class="pagetext">
				<label>{$mod->Lang('choose_preprocessor')}:</label>
				<br><br>
			</p>



				{foreach from=$preprocessors item=preprocessor key=dir}

					<label class="preprocessor c_full">
						<div class="input_radio grid_2">
							<input type="radio" name="{$actionid}preprocessor" value="{$preprocessor->dir}" {if $current_preprocessor eq $preprocessor->dir}checked{/if}>
						</div>

						{if isset($preprocessor->logo) and !empty($preprocessor->logo)}
							<div class="logo grid_2">
								<img src="{$mod->GetModuleURLPath()}/preprocessors/{$preprocessor->dir}/{$preprocessor->logo}" width="100">
							</div>
						{/if}

						<div class="description grid_{if isset($preprocessor->logo) and !empty($preprocessor->logo)}8{else}10{/if}">
							<h2>{$preprocessor->friendly_name}</h2>
							<p>
								{$preprocessor->description} - By <a href="{$preprocessor->website}" target="_blank"><em>{$preprocessor->author}</em></a>

								{if !empty($preprocessor->note)}
									<br><strong>{$mod->Lang('note')}</strong> {$preprocessor->note}
								{/if}
							</p>




						</div>


					</label>

				{/foreach}

		</div>

	</fieldset> {*End pre processor*}


	<fieldset>
		<legend>{$mod->Lang('options')}</legend>

		<div class="pageoverflow">
			<p class="pagetext">
				<label for='import_dirs'>{$mod->Lang('import_dirs')}</label>
			</p>
			<p class="pageinput">
				<input type="text" name='{$actionid}import_dirs' id='import_dirs' value='{$import_dirs}' style="width: 90%">
			</p>
		</div>

		<div class="pageoverflow">
			<p class="pagetext">
				<label>{$mod->Lang('minify')}</label>
			</p>
			<p class="pageinput">
				<label for='minify'>
					<input type="hidden" name='{$actionid}minify' value='0'>
					<input type="checkbox" name='{$actionid}minify' id='minify' value='1' {if $minify}checked="checked"{/if}>

					{$mod->Lang('minify_label')}
				</label>
			</p>
		</div>

		<div class="pageoverflow">
			<p class="pagetext">
				<label>{$mod->Lang('generate_sourcemap')}</label>
			</p>
			<p class="pageinput">
				<label for='generate_sourcemap'>
					<input type="hidden" name='{$actionid}generate_sourcemap' value='0'>
					<input type="checkbox" name='{$actionid}generate_sourcemap' id='generate_sourcemap' value='1' {if $generate_sourcemap}checked="checked"{/if}>

					{$mod->Lang('generate_sourcemap_label')}
				</label>
			</p>
		</div>

		<div class="pageoverflow">
			<p class="pagetext">
				<label>Autoprefixer</label>
			</p>
			<p class="pageinput">
				<label for='use_autoprefixer'>
					<input type="hidden" name='{$actionid}use_autoprefixer' value='0'>
					<input type="checkbox" name='{$actionid}use_autoprefixer' id='use_autoprefixer' value='1' {if $use_autoprefixer}checked="checked"{/if}>

					{$mod->Lang('use_autoprefixer')}
				</label>
			</p>
		</div>


	</fieldset>





	<div class="pageoverflow">
		<p class="pageinput">
			<input type="submit" name="{$actionid}submit" value="{$mod->Lang('submit')}"/>
			<input type="submit" name="{$actionid}cancel" value="{$mod->Lang('cancel')}"/>
		</p>
	</div>



{$form_end}
