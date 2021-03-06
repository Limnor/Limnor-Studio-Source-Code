﻿/*
 
 * Author:	Bob Limnor (info@limnor.com)
 * Project: Limnor Studio
 * Item:	Project Explorer
 * License: GNU General Public License v3.0
 
 */
using System;
using System.Collections.Generic;
using System.Text;

namespace SolutionMan.Solution
{
	public class ItemSelection
	{
		public const string Safeitemname = "$safeitemname$";
		private Dictionary<string, string> _replaceNames;
		public ItemSelection()
		{
			_replaceNames = new Dictionary<string, string>();
		}
		public string ItemName;
		public string ItemTemplate;
		public string ClassTemplate;
		public string NewClassFile;
		public Dictionary<string, string> ReplaceNames
		{
			get
			{
				return _replaceNames;
			}
		}

	}
}
