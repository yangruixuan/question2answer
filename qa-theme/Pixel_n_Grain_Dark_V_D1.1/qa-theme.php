<?php

/*
	Question2Answer (c) Gideon Greenspan

	http://www.question2answer.org/

	
	File: qa-theme/Candy/qa-theme.php
	Version: See define()s at top of qa-include/qa-base.php
	Description: Override something in base theme class for Candy theme


	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	More about this license: http://www.question2answer.org/license.php
*/

	class qa_html_theme extends qa_html_theme_base
	{		
		// adding ie specific css
		function head_script()
		{
			if (isset($this->content['script']))
				foreach ($this->content['script'] as $scriptline)
					$this->output_raw($scriptline);
			
			$this->output('<!--[if IE]>');	
			$this->output('<LINK REL="stylesheet" TYPE="text/css" HREF="'.$this->rooturl.$this->ie_css().'"/>');
			$this->output('<![endif]-->');
		}
		
		function ie_css()
		{
			return 'ie.css';		
		}
		
		
		// header part
		function nav_user_search() // reverse the usual order
		{
			$this->search();
			$this->nav('user');
		}
		
		// main content div
		function q_view_content($q_view)
		{
			if (!empty($q_view['content']))
				$this->output(
					'<DIV CLASS="qa-q-view-content clearfix">',
					$q_view['content'],
					'</DIV>'
				);
		}
		
		// custom footer
		function footer()
        {
            $this->output('<DIV CLASS="qa-footer">');			
			
			$this->output('<DIV CLASS="footer-copyright">');
			$this->output('<p>Copyright &copy; '.date('Y').' '.$this->content['site_title'].' - All rights reserved.</p>');
			$this->output('</DIV>');
			
			$this->attribution();							
			
			$this->output('<DIV CLASS="footer-credit">');
			$this->output('<p>Theme Designed By: <a href="http://pixelngrain.com">Pixel n Grain</a></p>');
			$this->output('</DIV>');
			
			$this->nav('footer');	
			
			$this->footer_clear();
            
            $this->output('</DIV> <!-- END qa-footer -->', '');
			

        }
	}
	
	
	 

/*
	Omit PHP closing tag to help avoid accidental output
*/