To Collaborators or Contributors,

Make use of these formats when committing changes:

Adding a file:
 - Single File - Make use of "ADDED <FileName>" and include a description of its purpose.
 - Multiple Files - Make use of "ADDED FILES" and include in the description these <FileNames> and their purpose.

Modifying a file:
 - Single File - Make use of "MODIFIED <FileName>" and include a description regarding the changes.
 - Multiple Files - Make use of "MODIFIED FILES" and include in the description these <FileNames> and their output changes.

Deleting a file:
 - Single File - Make use of "DELETED <FileName>" and include a description of its reason.
- Multiple Files - Make use of "DELETED FILES" and include in the description these <FileNames> and their reason for deletion.



 Note that when pushing to the remote repo:

 - always use a different branch name. 
 - Name of the branch shall be based on the purpose of the commit (Example: ADDED-<FileName or "FILES">, MODIFIED-<FileName or "FILES">, or DELETED-<FileName or "FILES">) 
 - Upon successfully merging, remove the used branch.



 For Collaborators - You can commit as Main branch only when:

 - When there is a need for a quick fix - fixes such as typo, white spaces, and the like.
 - When the owner of the repo is not present to Merge Pull requests but is in haste.

 CSS and JS : class/id and function naming convention - Written in PascalCase or TitleCase, Naming Convention:
 - ./#<PageName+ActualName>

 Remember to always to Fetch and pull from remote repo before pushing.